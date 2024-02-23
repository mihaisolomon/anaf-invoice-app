<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateAnafApplicationForm from "@/Pages/Anaf/Applications/Partials/CreateAnafApplicationForm.vue";
</script>

<template>
  <AppLayout title="Create Team">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create ANAF application
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <create-anaf-application-form></create-anaf-application-form>
      </div>
    </div>
  </AppLayout>
</template>
