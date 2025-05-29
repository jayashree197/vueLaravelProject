<template>
  <AuthenticatedLayout>
    <div class="max-w-6xl mx-auto py-10 px-6">
      <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Companies Box -->
        <a
          href="/admin/companies"
          class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition p-6 flex flex-col justify-between"
        >
          <div>
            <p class="text-gray-700 text-xl font-semibold">Total Companies</p>
            <p class="text-4xl font-bold text-blue-600 mt-2">{{ companiesCount }}</p>
          </div>
          <div class="mt-4 text-blue-500 hover:underline font-medium">
            Visit Companies Page
          </div>
        </a>

        <!-- Employees Box -->
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
          <p class="text-gray-700 text-xl font-semibold">Total Employeesgggh</p>
          <p class="text-4xl font-bold text-green-600 mt-2">{{ employeesCount }}</p>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
  companiesCount: Number,
  employeesCount: Number,
});
</script>