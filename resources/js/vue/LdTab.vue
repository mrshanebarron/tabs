<script setup lang="ts">
import { inject, computed } from 'vue'

interface Props {
  tabKey: string
}

const props = defineProps<Props>()

const tabs = inject<{ active: { value: string } }>('tabs')
const isActive = computed(() => tabs?.active.value === props.tabKey)
</script>

<template>
  <div v-show="isActive">
    <slot />
  </div>
</template>
