import { describe, it, expect, vi } from 'vitest';
import { mount } from '@vue/test-utils';
import { createTestingPinia } from '@pinia/testing';
import Counter from '../CounterComponent.vue';


function mountCounter(x = 0) {
  const wrapper = mount(Counter, {
    global: {
      plugins: [
        createTestingPinia({
          createSpy: vi.fn,
          initialState: {
            counter: { count: x },
          },
        }),
      ],
    },
  });
  return wrapper;
}

describe('Counter', () => {
  it('renders properly', () => {
    const wrapper = mountCounter(50);
    expect(wrapper.text()).toContain('Counter: 50');
  });

  describe('Clicks', () => {
    it('increments counter', async () => {
      const wrapper = mountCounter(10);
      const store = wrapper.vm.counterStore;

      // Simuler un clic sur le bouton Increment
      const incrementButton = wrapper.find('button:nth-child(2)');
      await incrementButton.trigger('click');


      expect(store.increment).toHaveBeenCalled();
      expect(store.count).toBe(11);
    });

    it('decrements counter', async () => {
      const wrapper = mountCounter(10);
      const store = wrapper.vm.counterStore;


      const decrementButton = wrapper.find('button:nth-child(1)');
      await decrementButton.trigger('click');


      expect(store.decrement).toHaveBeenCalled();
      expect(store.count).toBe(9);
    });
  });
});
