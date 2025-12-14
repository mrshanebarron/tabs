<template>
  <div
    v-show="isActive"
    :id="`panel-${tabKey}`"
    role="tabpanel"
  >
    <slot></slot>
  </div>
</template>

<script>
import { inject, computed } from 'vue';

export default {
  name: 'SbTabPanel',
  props: {
    tabKey: { type: String, required: true }
  },
  setup(props) {
    const tabs = inject('tabs');
    const isActive = computed(() => tabs.active.value === props.tabKey);

    return { isActive };
  }
};
</script>
