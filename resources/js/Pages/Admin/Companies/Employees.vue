<template>
  <AuthenticatedLayout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-md mt-10">
      <!-- Back Link -->
      <div class="mb-6">
        <Link :href="`/admin/companies/${company.id}/edit`" class="text-blue-600 hover:underline text-sm">
          ← Back to Company Edit Page
        </Link>
      </div>

      <h1 class="text-2xl font-semibold mb-6 text-gray-800">Edit Company: {{ company.name }}</h1>

      <!-- Success Message -->
      <div v-if="successMessage" class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
        <p>{{ successMessage }}</p>
      </div>

      <!-- Employee List Table -->
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Employees</h2>
      <table class="min-w-full table-auto mb-6 border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-600 text-gray-100">
            <th class="px-4 py-2 text-left font-semibold border border-gray-300">Employee Name</th>
            <th class="px-4 py-2 text-left font-semibold border border-gray-300">Email</th>
            <th class="px-4 py-2 text-left font-semibold border border-gray-300">Address</th>
            <th class="px-4 py-2 text-left font-semibold border border-gray-300">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="employee in employees" :key="employee.id" class="border-b">
            <td class="px-4 py-2 border border-gray-300">{{ employee.first_name }} {{ employee.last_name }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ employee.email }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ employee.address }}</td>
            <td class="px-4 py-2 border border-gray-300">
              <button @click="deleteEmployee(employee.id)" class="btn-danger hover:bg-red-700 transition-all">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Add Employee Form -->
      <h2 class="text-lg font-semibold mb-4 text-gray-700">Add New Employee</h2>
      <form @submit.prevent="createEmployee" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="form-label">First Name</label>
            <input 
              v-model="employee.first_name" 
              class="form-input" 
              :class="{'border-red-500': formErrors.employee.first_name}" 
              @input="validateEmployee"
            />
            <span v-if="formErrors.employee.first_name" class="text-red-500 text-sm">First name is required.</span>
          </div>
          <div>
            <label class="form-label">Last Name</label>
            <input 
              v-model="employee.last_name" 
              class="form-input" 
              :class="{'border-red-500': formErrors.employee.last_name}" 
              @input="validateEmployee"
            />
            <span v-if="formErrors.employee.last_name" class="text-red-500 text-sm">Last name is required.</span>
          </div>
          <div>
            <label class="form-label">Email</label>
            <input 
              v-model="employee.email" 
              class="form-input" 
              :class="{'border-red-500': formErrors.employee.email}" 
              @input="validateEmployee"
            />
            <span v-if="formErrors.employee.email" class="text-red-500 text-sm">Email is required.</span>
            <span v-if="employee.email && !validateEmail(employee.email)" class="text-red-500 text-sm">Invalid email format.</span>
          </div>
          <div>
            <label class="form-label">Address</label>
            <input 
              v-model="employee.address" 
              class="form-input" 
              :class="{'border-red-500': formErrors.employee.address}" 
              @input="validateEmployee"
            />
            <span v-if="formErrors.employee.address" class="text-red-500 text-sm">Address is required.</span>
          </div>
        </div>
        <div class="text-right">
          <button type="submit" class="btn-success hover:bg-green-700 transition-all" :disabled="formErrors.employee.first_name || formErrors.employee.last_name || formErrors.employee.email || formErrors.employee.address">
            Add Employee
          </button>
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
    Link, // Used for the back link navigation
    AuthenticatedLayout
  },
  props: {
    company: Object,  // The company being edited
    employees: Array, // List of employees associated with the company
  },
  data() {
    return {
      employee: {
        first_name: '',
        last_name: '',
        email: '',
        address: '',
      },
      formErrors: {
        company: {
          name: false,
          abn: false,
          email: false,
          address: false,
        },
        employee: {
          first_name: false,
          last_name: false,
          email: false,
          address: false,
        },
      },
      successMessage: '', // New reactive data property for success message
    };
  },
  methods: {
    // Validate Email Format
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

    validateEmployee() {
      this.formErrors.employee.first_name = !this.employee.first_name;
      this.formErrors.employee.last_name = !this.employee.last_name;
      this.formErrors.employee.email = !this.employee.email || !this.validateEmail(this.employee.email);
      this.formErrors.employee.address = !this.employee.address;
    },

    async updateCompany() {
      this.validateCompany();
      if (Object.values(this.formErrors.company).includes(true)) return; // Do not submit if there are errors
      await this.$inertia.put(`/admin/companies/${this.company.id}`, this.company);

      // Show success message and reset after 3 seconds
      this.successMessage = 'Company updated successfully!';
      setTimeout(() => {
        this.successMessage = '';
      }, 3000);
    },

    async createEmployee() {
      this.validateEmployee();
      if (Object.values(this.formErrors.employee).includes(true)) return; // Do not submit if there are errors
      await this.$inertia.post(`/admin/companies/${this.company.id}/employees`, this.employee);

      // Show success message and reset after 3 seconds
      this.successMessage = 'Employee added successfully!';
      setTimeout(() => {
        this.successMessage = '';
      }, 3000);

      // Reset form fields
      this.employee = { first_name: '', last_name: '', email: '', address: '' };
    },

    async deleteEmployee(employeeId) {
      if (confirm("Are you sure you want to delete this employee?")) {
        await this.$inertia.delete(`/admin/companies/${this.company.id}/employees/${employeeId}`);
      }
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
.btn-danger {
  @apply bg-red-600 text-white py-2 px-4 rounded-md transition-all;
}
.btn-success {
  @apply bg-green-600 text-white py-2 px-4 rounded-md transition-all;
}
</style>