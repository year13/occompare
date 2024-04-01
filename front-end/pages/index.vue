<script setup lang="ts">
import SelectOccupation from "~/components/inputs/SelectOccupation.vue";

const loading = ref<boolean>(false);
const matchedScore = ref<number | null>(null);
const occupation1 = ref<string | undefined>(undefined);
const occupation2 = ref<string | undefined>(undefined);

const compareOccupations = async () => {
  try {
    if (!occupation1.value || !occupation2.value) {
      return;
    }

    loading.value = true;

    const response = await fetch("/api/compare", {
      method:'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        occupation_1: occupation1.value,
        occupation_2: occupation2.value,
      }),
    });

    const responseJson = await response.json();

    console.log(responseJson);

    matchedScore.value = responseJson.match;
  } catch (err) {
    console.error(err);
  } finally {
    loading.value = false;
  }
};

const disabled = computed(
  () => !occupation1.value || !occupation2.value || loading.value
);
</script>

<template>
  <div class="max-w-full py-6 mx-auto sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
      <div class="flex items-center mb-10">
        <h1 class="text-4xl font-bold">Occompare</h1>
      </div>

      <div class="flex flex-col items-center justify-center">
        <div class="grid w-full grid-cols-12 gap-4">
          <div class="col-span-5">
            <div class="flex flex-col">
              <label class="mb-1 font-semibold">Occupation 1</label>
              <SelectOccupation
                v-model="occupation1"
                placeholder="Select Occupation 1"
              />
            </div>
          </div>

          <div class="col-span-5">
            <div class="flex flex-col">
              <label class="mb-1 font-semibold">Occupation 2</label>
              <SelectOccupation
                v-model="occupation2"
                placeholder="Select Occupation 2"
              />
            </div>
          </div>

          <div class="flex items-end justify-end col-span-2">
            <Button @click="compareOccupations" :disabled="disabled" />
          </div>
        </div>

        <div class="flex items-center justify-start w-full mt-5">
          <template v-if="matchedScore !== null && !loading">
            <h4 class="text-lg font-bold">Matched score: {{ matchedScore }}</h4>
          </template>
          <template v-else-if="matchedScore === null && !loading">
            <p class="mb-0 text-gray-500">
              Please select two Occupations from above and click Compare
            </p>
          </template>
          <template v-else-if="loading">
            <p class="mb-0">Please wait...</p>
          </template>
        </div>
        <!--  Use this space to visualize and present the result/breakdown or whatever you see fit  -->
      </div>
    </div>
  </div>
</template>

