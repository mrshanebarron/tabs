<template>
  <div>
    <!-- Tab List -->
    <div :class="variantConfig.list" role="tablist">
      <button
        v-for="(label, key) in tabs"
        :key="key"
        @click="setActive(key)"
        :class="active === key ? variantConfig.tab_active : variantConfig.tab"
        role="tab"
        :aria-selected="active === key"
        :aria-controls="`panel-${key}`"
      >
        {{ label }}
      </button>
    </div>

    <!-- Tab Panels -->
    <div class="mt-4">
      <slot :active="active"></slot>
    </div>
  </div>
</template>

<script>
import { ref, computed, provide } from 'vue';

export default {
  name: 'LdTabs',
  props: {
    tabs: { type: Object, required: true },
    defaultActive: { type: String, default: null },
    variant: { type: String, default: 'default' }
  },
  emits: ['change'],
  setup(props, { emit }) {
    const variants = {
      default: {
        list: 'flex border-b border-gray-200',
        tab: 'px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent -mb-px cursor-pointer transition-colors',
        tab_active: 'px-4 py-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 -mb-px cursor-pointer'
      },
      pills: {
        list: 'flex gap-2',
        tab: 'px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 cursor-pointer transition-colors',
        tab_active: 'px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg cursor-pointer'
      },
      boxed: {
        list: 'flex bg-gray-100 p-1 rounded-lg',
        tab: 'px-4 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 cursor-pointer transition-colors',
        tab_active: 'px-4 py-2 text-sm font-medium text-gray-900 bg-white rounded-md shadow cursor-pointer'
      }
    };

    const active = ref(props.defaultActive || Object.keys(props.tabs)[0] || null);
    const variantConfig = computed(() => variants[props.variant] || variants.default);

    const setActive = (key) => {
      active.value = key;
      emit('change', key);
    };

    provide('tabs', { active, setActive });

    return { active, variantConfig, setActive };
  }
};
</script>
