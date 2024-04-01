<script setup lang="ts">
// @ts-ignore
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import type { Occupation } from "~/types";

const props = defineProps<{ placeholder?: string }>();
const model = defineModel<string | undefined | null>();

const occupations = ref<Occupation[]>([]);

const getOccupations = async () => {
  try {
    const response = await fetch("/api/occupations");
    occupations.value = await response.json();
  } catch (err) {
    console.error(err);
  }
};

onMounted(() => {
  getOccupations();
});

const selected = computed({
  set(value?: string | null) {
    model.value = value;
  },
  get() {
    return model.value;
  },
});
</script>

<template>
  <div>
    <VSelect
      :placeholder="props.placeholder || 'Select value'"
      v-model="selected"
      label="title"
      :reduce="(occupation: Occupation) => occupation.code"
      :options="occupations"
    />
  </div>
</template>

<style>
.v-select {
  @apply w-full !font-sans;
}

.vs__search {
  @apply !font-sans;
}

.v-select > .vs__dropdown-toggle {
  @apply border shadow-sm rounded-md border-gray-300;
}

.v-select > ul {
  @apply shadow-md border border-gray-300 rounded-b-md;
}

.v-select > ul > .vs__dropdown-option {
  @apply whitespace-normal border-b !py-1 border-b-gray-100 !font-sans;
  text-wrap: pretty;
}

.v-select > ul > .vs__dropdown-option.vs__dropdown-option--highlight {
  @apply bg-blue-500;
}
</style>
