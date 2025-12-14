# Laravel Design Tabs

Tab navigation component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/tabs
```

For Vue components:
```bash
npm install @laraveldesign/tabs
```

## Usage

### Livewire Component

```blade
<livewire:ld-tabs :tabs="['profile' => 'Profile', 'settings' => 'Settings', 'notifications' => 'Notifications']" active="profile">
    <x-slot name="profile">
        <h2>Profile Settings</h2>
        <p>Update your profile information here.</p>
    </x-slot>

    <x-slot name="settings">
        <h2>Account Settings</h2>
        <p>Manage your account preferences.</p>
    </x-slot>

    <x-slot name="notifications">
        <h2>Notification Preferences</h2>
        <p>Choose how you want to be notified.</p>
    </x-slot>
</livewire:ld-tabs>

{{-- With different styles --}}
<livewire:ld-tabs
    :tabs="$tabs"
    active="tab1"
    style="pills"
    orientation="vertical"
/>
```

### Blade Component

```blade
<x-ld-tabs>
    <x-ld-tab name="overview" label="Overview" :active="true">
        <p>Overview content goes here.</p>
    </x-ld-tab>

    <x-ld-tab name="details" label="Details">
        <p>Detailed information.</p>
    </x-ld-tab>

    <x-ld-tab name="reviews" label="Reviews" :badge="5">
        <p>Customer reviews.</p>
    </x-ld-tab>
</x-ld-tabs>
```

### Vue 3 Component

```vue
<script setup>
import { ref } from 'vue'
import { LdTabs, LdTab } from '@laraveldesign/tabs'

const activeTab = ref('general')
</script>

<template>
  <LdTabs v-model="activeTab" style="underline">
    <LdTab name="general" label="General">
      <p>General settings content.</p>
    </LdTab>

    <LdTab name="security" label="Security">
      <p>Security settings content.</p>
    </LdTab>

    <LdTab name="billing" label="Billing">
      <p>Billing information.</p>
    </LdTab>
  </LdTabs>
</template>
```

## Props

### Tabs Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `tabs` | array | `[]` | Array of tabs: `['key' => 'Label']` |
| `active` | string | first tab | Key of the active tab |
| `style` | string | `'underline'` | Tab style: `underline`, `pills`, `boxed` |
| `orientation` | string | `'horizontal'` | Layout: `horizontal`, `vertical` |

### Tab Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Unique tab identifier |
| `label` | string | required | Tab button label |
| `active` | boolean | `false` | Whether tab is initially active |
| `badge` | mixed | `null` | Optional badge to display |
| `disabled` | boolean | `false` | Disable the tab |

## Events

### Livewire Events

```javascript
Livewire.on('tab-changed', ({ key }) => {
    console.log('Active tab:', key);
});
```

### Vue Events

```vue
<LdTabs @change="handleTabChange">
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-tabs-config
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-tabs-views
```

## Tab Styles

**Underline** (default): Clean underlined indicator for active tab

**Pills**: Rounded pill-shaped buttons

**Boxed**: Bordered box-style tabs

## License

MIT
