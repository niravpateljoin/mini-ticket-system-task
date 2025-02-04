<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">Ticketing System</h1>

    <!-- Create Ticket Form -->
    <form v-if="!editingTicket" @submit.prevent="createTicket" class="space-y-4">
      <input v-model="title" class="border p-2 w-full" placeholder="Title" required />
      <textarea v-model="description" class="border p-2 w-full" placeholder="Description" required></textarea>
      <select v-model="status" class="border p-2 w-full">
        <option value="">Select Status</option>
        <option value="open">Open</option>
        <option value="in_progress">In Progress</option>
        <option value="closed">Closed</option>
      </select>
      <button class="bg-blue-500 text-white px-4 py-2" type="submit">Create Ticket</button>
    </form>

    <!-- Filter Dropdown -->
    <div class="mb-4 mt-4">
      <label for="status" class="mr-2">Filter by Status:</label>
      <select v-model="statusFilter" @change="fetchTickets" class="border p-2">
        <option value="">All</option>
        <option value="open">Open</option>
        <option value="in_progress">In Progress</option>
        <option value="closed">Closed</option>
      </select>
    </div>

    <!-- Ticket List -->
    <div v-if="tickets.length !== 0">
      <table class="w-full text-left table-auto min-w-max">
        <thead>
          <tr>
            <td>Title</td>
            <td>Description</td>
            <td>Status</td>
            <td>Edit/Delete</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ticket in tickets" :key="ticket?.id" class="border p-4 mt-4">
            <td>{{ ticket?.title }}</td>
            <td>{{ ticket?.description }}</td>
            <td>{{ capitalize(ticket?.status) }}</td>
            <td><button @click="editTicket(ticket)" class="bg-yellow-500 text-white px-4 py-2 mt-2">Edit</button><button @click="deleteTicket(ticket?.id)" class="bg-red-500 text-white px-4 py-2 mt-2">Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Edit Ticket Form (Visible when editing) -->
    <div v-if="editingTicket" class="mt-4 p-4 border">
      <h2 class="text-lg font-semibold">Edit Ticket</h2>
      <input v-model="editingTicket.title" class="border p-2 w-full" placeholder="Title" required />
      <textarea v-model="editingTicket.description" class="border p-2 w-full" placeholder="Description" required></textarea>
      <select v-model="editingTicket.status" class="border p-2 w-full">
        <option value="">Select Status</option>
        <option value="open">Open</option>
        <option value="in_progress">In Progress</option>
        <option value="closed">Closed</option>
      </select>
      <button @click="updateTicket" class="bg-blue-500 text-white px-4 py-2 mt-2">Update Ticket</button>
      <button @click="cancelEdit" class="bg-gray-500 text-white px-4 py-2 mt-2">Cancel</button>
    </div>
  </div>
</template>

<script>
import api from "./services/api";
import './index.css'

export default {
  data() {
    return {
      title: "",
      description: "",
      tickets: [],
      editingTicket: null,  // Holds the ticket being edited
      status: ""
    };
  },
  methods: {
    capitalize(s){
        return s
          .toLowerCase()                   
          .replace(/_/g, ' ')             
          .replace(/\b./g, function(a) {   
            return a.toUpperCase();
          });
    },
    async fetchTickets() {
      const filterQuery = this.statusFilter ? `?status=${this.statusFilter}` : '';
      const response = await api.get(`/tickets${filterQuery}`);
      this.tickets = response.data.data;
    },
    async createTicket() {
      await api.post("/tickets", { title: this.title, description: this.description,status:this.status });
      this.title = "";
      this.description = "";
      this.status = "";
      this.fetchTickets();
    },
    async deleteTicket(id) {
      await api.delete(`/tickets/${id}`);
      this.fetchTickets();
    },
    async editTicket(ticket) {
      // When editing, set the editingTicket object
      this.editingTicket = { ...ticket };
    },
    async updateTicket() {
      await api.put(`/tickets/${this.editingTicket.id}`, {
        title: this.editingTicket.title,
        description: this.editingTicket.description,
        status: this.editingTicket.status
      });
      this.editingTicket = null;  // Reset after update
      this.fetchTickets();
    },
    cancelEdit() {
      this.editingTicket = null;  // Cancel editing and clear the form
    },
  },
  mounted() {
    this.fetchTickets();
  },
};
</script>
