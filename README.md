# Tabs

A flexible tabbed interface component for Laravel applications. Supports multiple visual styles and accessibility features. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/tabs
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-tabs :tabs="['tab1' => 'Overview', 'tab2' => 'Details', 'tab3' => 'Settings']">
    <div x-show="$wire.active === 'tab1'">
        Overview content here.
    </div>
    <div x-show="$wire.active === 'tab2'">
        Details content here.
    </div>
    <div x-show="$wire.active === 'tab3'">
        Settings content here.
    </div>
</livewire:sb-tabs>
```

### With Default Active Tab

```blade
<livewire:sb-tabs
    :tabs="['info' => 'Information', 'history' => 'History']"
    default-active="history"
/>
```

### Different Variants

```blade
<!-- Default underline style -->
<livewire:sb-tabs :tabs="$tabs" variant="default" />

<!-- Pill buttons -->
<livewire:sb-tabs :tabs="$tabs" variant="pills" />

<!-- Boxed/segmented style -->
<livewire:sb-tabs :tabs="$tabs" variant="boxed" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `tabs` | array | required | Key-value pairs of tab keys and labels |
| `default-active` | string | first tab | Initially active tab key |
| `variant` | string | `'default'` | Style: `default`, `pills`, `boxed` |

## Vue 3 Usage

### Setup

```javascript
import { SbTabs, SbTabPanel } from './vendor/sb-tabs';
app.component('SbTabs', SbTabs);
app.component('SbTabPanel', SbTabPanel);
```

### Basic Usage

```vue
<template>
  <SbTabs :tabs="{ tab1: 'Overview', tab2: 'Details', tab3: 'Settings' }">
    <template #default="{ active }">
      <div v-show="active === 'tab1'">
        Overview content here.
      </div>
      <div v-show="active === 'tab2'">
        Details content here.
      </div>
      <div v-show="active === 'tab3'">
        Settings content here.
      </div>
    </template>
  </SbTabs>
</template>
```

### Variants

```vue
<template>
  <!-- Default: underline style -->
  <SbTabs :tabs="tabs" variant="default">
    ...
  </SbTabs>

  <!-- Pills: button style -->
  <SbTabs :tabs="tabs" variant="pills">
    ...
  </SbTabs>

  <!-- Boxed: segmented control style -->
  <SbTabs :tabs="tabs" variant="boxed">
    ...
  </SbTabs>
</template>

<script setup>
const tabs = {
  overview: 'Overview',
  features: 'Features',
  pricing: 'Pricing'
};
</script>
```

### With Change Event

```vue
<template>
  <SbTabs
    :tabs="tabs"
    default-active="features"
    @change="handleTabChange"
  >
    <template #default="{ active }">
      <div v-show="active === 'overview'">Overview</div>
      <div v-show="active === 'features'">Features</div>
    </template>
  </SbTabs>
</template>

<script setup>
const handleTabChange = (tabKey) => {
  console.log('Active tab:', tabKey);
};
</script>
```

### Dynamic Tabs

```vue
<template>
  <SbTabs :tabs="dynamicTabs">
    <template #default="{ active }">
      <div v-for="(tab, key) in dynamicTabs" :key="key">
        <div v-show="active === key">
          Content for {{ tab }}
        </div>
      </div>
    </template>
  </SbTabs>
</template>

<script setup>
import { computed } from 'vue';

const items = ref([
  { id: 'item1', name: 'First Item' },
  { id: 'item2', name: 'Second Item' }
]);

const dynamicTabs = computed(() => {
  return items.value.reduce((acc, item) => {
    acc[item.id] = item.name;
    return acc;
  }, {});
});
</script>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `tabs` | Object | required | `{ key: 'Label' }` pairs |
| `defaultActive` | String | first key | Initially active tab |
| `variant` | String | `'default'` | Style variant |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `change` | `string` | Emitted when active tab changes |

### Scoped Slot

The default slot receives:
- `active`: Current active tab key

## Variants

### Default (Underline)
Traditional tab style with underline indicator on active tab.

### Pills
Button-style tabs with background color on active tab.

### Boxed
Segmented control style with contained background.

## Accessibility

- Proper `role="tablist"` and `role="tab"` attributes
- `aria-selected` indicates active state
- `aria-controls` links tabs to panels
- Keyboard navigation support

## Styling

Uses Tailwind CSS:
- Border-based underline for default
- Rounded backgrounds for pills
- Gray background container for boxed

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
