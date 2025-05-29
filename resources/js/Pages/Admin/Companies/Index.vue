<template>
  <AuthenticatedLayout>
    <Head title="Your Companies" />

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header and Create Button -->
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-3xl font-semibold text-gray-800">Manage Your Companies</h1>
          <Link
            href="/admin/companies/create"
            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md shadow-lg hover:bg-blue-700 transition-all"
          >
            + Add New Company
          </Link>
        </div>

        <!-- Companies Count Information -->
        <p class="text-gray-600 mb-6 text-sm">
          Currently, we have {{ companies.length }} {{ companies.length !== 1 ? 'companies' : 'company' }} listed.
        </p>

        <!-- Companies Table -->
        <table class="min-w-full table-auto mb-6 border-collapse border border-gray-300">
          <thead>
            <tr class="bg-gray-600 text-gray-100">
              <th class="px-4 py-2 text-left font-semibold border border-gray-300">Company Name</th>
              <th class="px-4 py-2 text-left font-semibold border border-gray-300">Email</th>
              <th class="px-4 py-2 text-left font-semibold border border-gray-300">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="company in companies" :key="company.id" class="border-b">
              <td class="px-4 py-2 border border-gray-300">{{ company.name }}</td>
              <td class="px-4 py-2 border border-gray-300">{{ company.email }}</td>
              <td class="px-4 py-2 border border-gray-300">
                <Link
                  :href="`/admin/companies/${company.id}/edit`"
                  class="text-sm text-blue-600 hover:underline"
                >
                  Edit Company
                </Link>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- No Companies Found Message -->
        <div v-if="!companies.length" class="text-center text-gray-500 mt-12">
          No companies found. 
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { Link, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
  props: {
    companies: Array,  // List of companies passed as a prop
  },
  components: {
    AuthenticatedLayout,
    Link,
    Head
  }
};
</script>

<style scoped>
/* Custom styling for hover effect on table rows excluding the header */
tbody tr:hover {
  background-color: #f7fafc;
}
</style>