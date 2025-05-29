<template>
  <AuthenticatedLayout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-md mt-10">
      <!-- Back Link -->
      <div class="mb-6">
        <Link href="/admin/companies" class="text-blue-600 hover:underline text-sm">
          ← Back to Companies Page
        </Link>
      </div>

      <h1 class="text-2xl font-semibold mb-6 text-gray-800">Edit Company: {{ company.name }}</h1>

      <!-- Success Message -->
      <div v-if="successMessage" class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
        <p>{{ successMessage }}</p>
      </div>

      <!-- Company Edit Form -->
      <form @submit.prevent="updateCompany" class="space-y-6 mb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="form-label">Company Name</label>
            <input 
              v-model="company.name" 
              class="form-input" 
              :class="{'border-red-500': formErrors.company.name}" 
              required
              @input="validateCompany"
            />
            <span v-if="formErrors.company.name" class="text-red-500 text-sm">Company name is required.</span>
          </div>

          <div>
            <label class="form-label">ABN</label>
            <input 
              v-model="company.abn" 
              class="form-input" 
              :class="{'border-red-500': formErrors.company.abn}" 
              required
              @input="validateCompany"
            />
            <span v-if="formErrors.company.abn" class="text-red-500 text-sm">ABN is required.</span>
          </div>

          <div>
            <label class="form-label">Email</label>
            <input 
              v-model="company.email" 
              class="form-input" 
              :class="{'border-red-500': formErrors.company.email}" 
              required
              @input="validateCompany"
            />
            <span v-if="formErrors.company.email" class="text-red-500 text-sm">Email is required.</span>
            <span v-if="company.email && !validateEmail(company.email)" class="text-red-500 text-sm">Invalid email format.</span>
          </div>

          <div>
            <label class="form-label">Address</label>
            <input 
              v-model="company.address" 
              class="form-input" 
              :class="{'border-red-500': formErrors.company.address}" 
              required
              @input="validateCompany"
            />
            <span v-if="formErrors.company.address" class="text-red-500 text-sm">Address is required.</span>
          </div>
        </div>

        <div class="flex justify-between items-center">
          <!-- Save Company Button on the Right -->
          <button 
            type="submit" 
            class="btn-primary" 
            :disabled="formErrors.company.name || formErrors.company.abn || formErrors.company.email || formErrors.company.address"
          >
            Save Company
          </button>

          <!-- Manage Employees Link on the Left -->
          <Link :href="`/admin/companies/${company.id}/employees`" class="btn-primary">
            Manage Employees
          </Link>
        </div>
      </form> 
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
  components: {
    Link,
    AuthenticatedLayout
  },
  props: {
    company: Object,
  },
  data() {
    return {
      formErrors: {
        company: {
          name: false,
          abn: false,
          email: false,
          address: false,
        },
      },
      successMessage: '',
    };
  },
  methods: {
    validateEmail(email) {
      const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      return regex.test(email);
    },
    validateCompany() {
      this.formErrors.company.name = !this.company.name;
      this.formErrors.company.abn = !this.company.abn;
      this.formErrors.company.email = !this.company.email || !this.validateEmail(this.company.email);
      this.formErrors.company.address = !this.company.address;
    },
    async updateCompany() {
      this.validateCompany();
      if (Object.values(this.formErrors.company).includes(true)) return;
      await this.$inertia.put(`/admin/companies/${this.company.id}`, this.company);
      this.successMessage = 'Company updated successfully!';
      setTimeout(() => {
        this.successMessage = '';
      }, 3000);
    },
  },
};
</script>

<style scoped>
.form-label {
  @apply block mb-1 text-sm font-medium text-gray-700;
}
.form-input {
  @apply w-full p-2 border border-gray-300 rounded-md shadow-sm;
}
.btn-primary {
  @apply bg-blue-600 text-white py-2 px-4 rounded-md transition-all;
}
</style>