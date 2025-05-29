<template>
  <AuthenticatedLayout>
    <div class="max-w-2xl mx-auto mt-12 p-8 bg-white rounded-lg shadow-md">
      <!-- Page Header Section -->
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Create New Company</h2>
        
        <!-- Back Link: Allows the user to return to the Companies Page -->
        <a href="/admin/companies/" class="text-blue-600 hover:underline text-sm">
          ← Back to Companies Page
        </a>
      </div>

      <!-- Form for Creating a New Company -->
      <form @submit.prevent="submit" class="space-y-6">
        
        <!-- Company Name Input Field -->
        <div class="relative">
          <label for="name" class="form-label">Company Name</label>
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="form-input"
            placeholder=" "
            @input="clearError('name')" 
          />
          <!-- Display error if company name is invalid -->
          <p v-if="form.errors.name" class="form-error">{{ form.errors.name }}</p>
        </div>

        <!-- ABN Input Field -->
        <div class="relative">
          <label for="abn" class="form-label">ABN</label>
          <input
            v-model="form.abn"
            type="text"
            id="abn"
            class="form-input"
            placeholder=" "
            @input="clearError('abn')" 
          />
          <!-- Error message for ABN -->
          <p v-if="form.errors.abn" class="form-error">{{ form.errors.abn }}</p>
        </div>

        <!-- Email Input Field -->
        <div class="relative">
          <label for="email" class="form-label">Email</label>
          <input
            v-model="form.email"
            type="email"
            id="email"
            class="form-input"
            placeholder=" "
            @input="clearError('email')" 
          />
          <!-- Show email error if any -->
          <p v-if="form.errors.email" class="form-error">{{ form.errors.email }}</p>
        </div>

        <!-- Address Input Field -->
        <div class="relative">
          <label for="address" class="form-label">Address</label>
          <input
            v-model="form.address"
            type="text"
            id="address"
            class="form-input"
            placeholder=" "
            @input="clearError('address')" 
          />
          <!-- Error message for Address -->
          <p v-if="form.errors.address" class="form-error">{{ form.errors.address }}</p>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button
            type="submit"
            class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 transition"
            :disabled="form.processing"
          >
            {{ form.processing ? 'Saving...' : 'Save Company' }}
          </button>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
  components: {
    AuthenticatedLayout
  },
  data() {
    return {
      // The form object holds the company data and validation errors
      form: useForm({
        name: '',
        abn: '',
        email: '',
        address: ''
      })
    };
  },
  methods: {
    // Submit function to handle form submission
    submit() {
      // Sending POST request using the `useForm` helper function
      this.form.post('/admin/companies', {
        onSuccess: () => {
          // Clear any existing errors after successful submission
          this.clearAllErrors();
          // Display success message to the user
          alert('Company created successfully!');
        },
        onError: () => {
          // Handle any form errors here if needed (optional)
        }
      });
    },

    // Clear specific error for a field when the user starts typing
    clearError(field) {
      this.form.errors[field] = null;
    },

    // Clear all form errors
    clearAllErrors() {
      for (let field in this.form.errors) {
        this.form.errors[field] = null;
      }
    }
  }
};
</script>

<style scoped>
/* Form input styles */
.form-input {
  @apply w-full border border-gray-300 rounded-md px-3 pt-5 pb-2 text-gray-800 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent;
}

/* Label styles */
.form-label {
  @apply text-sm font-medium text-gray-600 mb-2 block;
}

/* Error message styling */
.form-error {
  @apply mt-1 text-sm text-red-500;
}
</style>