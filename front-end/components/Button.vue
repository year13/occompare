<script setup lang="ts">
const props = defineProps<{ disabled?: boolean }>();
const emit = defineEmits<{
  click: [payload: MouseEvent];
}>();
</script>

<template>
  <button
    :class="[
      'border rounded-lg flex items-center justify-center px-3 py-2 font-semibold',
      'bg-blue-500 text-white border-blue-600 hover:bg-blue-400 hover:border-blue-400 disabled:bg-blue-300 disabled:border-blue-300',
    ]"
    @click="(e) => emit('click', e)"
    :disabled="props.disabled"
  >
    Compare
  </button>
</template>

