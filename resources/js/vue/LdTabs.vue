<script setup lang="ts">
import { ref, provide, computed } from 'vue'

interface Tab {
  key: string
  title: string
  icon?: string
}

interface Props {
  tabs: Tab[]
  defaultActive?: string
  style?: 'underline' | 'pills' | 'bordered'
  orientation?: 'horizontal' | 'vertical'
}

const props = withDefaults(defineProps<Props>(), {
  defaultActive: '',
  style: 'underline',
  orientation: 'horizontal',
})

const emit = defineEmits<{
  (e: 'change', key: string): void
}>()

const active = ref(props.defaultActive || props.tabs[0]?.key || '')

function setActive(key: string) {
  active.value = key
  emit('change', key)
}

provide('tabs', { active, setActive })

const tabClasses = computed(() => ({
  underline: {
    active: 'border-blue-500 text-blue-600 border-b-2',
    inactive: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-b-2',
    base: 'py-4 px-1 text-sm font-medium',
  },
  pills: {
    active: 'bg-blue-100 text-blue-700',
    inactive: 'text-gray-500 hover:text-gray-700 hover:bg-gray-100',
    base: 'px-3 py-2 text-sm font-medium rounded-md',
  },
  bordered: {
    active: 'bg-white border-gray-200 border-b-white border',
    inactive: 'bg-gray-50 border-gray-200 text-gray-500 border',
    base: 'px-4 py-2 text-sm font-medium rounded-t-lg',
  },
}))
</script>

<template>
  <div :class="orientation === 'vertical' ? 'flex gap-4' : ''">
    <div :class="orientation === 'vertical' ? 'flex flex-col space-y-1' : 'border-b border-gray-200'">
      <nav :class="orientation === 'vertical' ? 'flex flex-col' : '-mb-px flex space-x-8'">
        <button
          v-for="tab in tabs"
          :key="tab.key"
          @click="setActive(tab.key)"
          :class="[
            tabClasses[style].base,
            active === tab.key ? tabClasses[style].active : tabClasses[style].inactive
          ]"
        >
          {{ tab.title }}
        </button>
      </nav>
    </div>
    <div :class="orientation === 'vertical' ? 'flex-1' : 'mt-4'">
      <slot />
    </div>
  </div>
</template>
