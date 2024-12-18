<template>
  <div class="admin-panel">
    <h1>Admin Panel</h1>

    <!-- Update Site Logo -->
    <h2>Update Site Logo</h2>
    <form @submit.prevent="uploadLogo">
      <input type="file" @change="onFileChange" />
      <button type="submit">Upload Logo</button>
    </form>
    <img :src="logoUrl" alt="Logo Preview" v-if="logoUrl" />

    <div v-for="page in pages" :key="page.id" class="page-section">
      <h2>{{ page.name }}</h2>

      <div
        v-for="section in page.sections"
        :key="section.id"
        class="section-block"
      >
        <h3>{{ section.name }}</h3>

        <form
          v-for="content in section.contents"
          :key="content.id"
          @submit.prevent="
            updateContent(section.id, content.key, content.value)
          "
        >
          <label>{{ content.key }}</label>
          <input v-model="content.value" type="text" />
          <button type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      logoUrl: "",
      file: null,
      pages: [],
    };
  },
  async created() {
    await this.fetchData();
  },
  methods: {
    async fetchData() {
      const response = await axios.get("http://localhost:8000/api/admin/data");
      this.pages = response.data;
    },
    onFileChange(event) {
      this.file = event.target.files[0];
    },
    async uploadLogo() {
      const formData = new FormData();
      formData.append("logo", this.file);

      const response = await axios.post(
        "http://localhost:8000/api/admin/update-logo",
        formData
      );
      this.logoUrl = `http://localhost:8000/storage/${response.data.image}`;
      alert(response.data.message);
    },
    async updateContent(sectionId, key, value) {
      await axios.post("http://localhost:8000/api/admin/update-content", {
        section_id: sectionId,
        key: key,
        value: value,
      });
      alert("Content updated successfully!");
    },
  },
};
</script>

<style scoped>
.admin-panel {
  padding: 2rem;
  max-width: 800px;
  margin: auto;
}
.page-section {
  margin-bottom: 2rem;
}
.section-block {
  margin-top: 1rem;
}
</style>
