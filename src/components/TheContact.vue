<template>
  <section class="section6">
    <h1 class="head_line">Let's keep in touch</h1>
    <p class="head_line_p">
      Feel free to reach out to us using the options below, and our dedicated
      team will respond to your inquiries promptly.
    </p>
    <div class="con1">
      <div class="con1_a">
        <h5>Let's connect</h5>
        <h1>We’re here to help</h1>
        <p>
          Need help with a project, have a question about our work? We’re here.
        </p>
        <input
          v-model="name"
          type="text"
          placeholder="Name"
          class="input"
        /><br />
        <input
          v-model="email"
          type="email"
          placeholder="Email Address"
          class="input"
        /><br />
        <textarea
          v-model="message"
          cols="30"
          rows="10"
          placeholder="Message"
          class="input"
        ></textarea>
        <button class="input_btn" @click="submitForm">Submit</button>
      </div>
      <div class="con1_b">
        <img src="../assets/image/contact-us.jpg" alt="" />
      </div>
    </div>
  </section>

  <section class="section4">
    <div class="con2">
      <div class="con2_a">
        <span class="icon"><font-awesome-icon :icon="['fas', 'book']" /></span>
        <span>
          <h2>Knowledge Hub</h2>
          <p>
            A comprehensive repository of knowledge designed to address your
            queries.
          </p>
        </span>
      </div>
      <div class="con2_a">
        <span class="icon"
          ><font-awesome-icon :icon="['fas', 'message']"
        /></span>
        <span>
          <h2>Chat to sales</h2>
          <p>
            Get detailed information about our products, pricing, and any
            current promotions.
          </p>
        </span>
      </div>
      <div class="con2_a">
        <span class="icon"
          ><font-awesome-icon :icon="['fas', 'phone-volume']"
        /></span>
        <span>
          <h2>Call for assistance</h2>
          <p>
            Our support team is available to answer your question, and provide
            technical help.
          </p>
        </span>
      </div>
    </div>
  </section>

  <section>
    <div class="con3">
      <div class="con3_a">
        <h1>Contact details</h1>
        <p>We have Branches In :</p>
        <ul>
          <li>Bangalore</li>
          <li>Hyderabad</li>
          <li>Delhi</li>
        </ul>
        <p>phone: 8977020524</p>
        <p>Email: connect@budzeeco.com</p>
      </div>
    </div>
    <!-- <img src="../assets/image/map.png" alt="" width="100%"> -->
  </section>
</template>

<script>
// import axios from "axios";

export default {
  data() {
    return {
      name: "",
      email: "",
      message: "",
    };
  },
  methods: {
    async submitForm() {
      try {
        // Sending form data to the server-side PHP script
        const response = await axios.post("mail/send_email.php", {
          name: this.name,
          email: this.email,
          message: this.message,
        });

        // Show a success message to the user
        alert(response.data.message);

        // Reset the form after successful submission
        this.resetForm();
      } catch (error) {
        console.error(error);
        alert("An error occurred. Please try again.");
      }
    },
    resetForm() {
      // Reset the form data to its initial state
      this.name = "";
      this.email = "";
      this.message = "";
    },
  },
};
</script>

<style scoped>
.con1 {
  display: flex;
}
.con1_a {
  width: 50%;
  background-color: #f5f2f0;
  padding: 2% 7%;
}
.con1_b {
  width: 50%;
}
.con1 img {
  width: 100%;
}
.con1_a h5 {
  display: inline;
  font-size: 20px;
  font-weight: 400;
  line-height: 24px;
  font-family: dm-sans;
  color: #052e26;
  margin: 15px 0;
  padding: 0 10px;
  background-color: white;
}
.con1_a h1 {
  font-size: 47px;
  font-weight: 500;
  line-height: 56px;
  font-family: dm-sans;
  color: #052e26;
  margin: 15px 0;
}
.con1_a p {
  font-size: 20px;
  font-weight: 400;
  line-height: 32px;
  font-family: dm-sans;
  color: #052e26;
  margin: 10px 0;
}
.input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  background-color: transparent;
  border: 1px solid lightgray;
  font-size: 15px;
  color: black;
}
.input_btn {
  background-color: black;
  color: white;
  margin: 10px 0;
  padding: 10px;
  width: 100%;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.input_btn:hover {
  background-color: transparent;
  color: black;
  border: 1px solid black;
}
.con2 {
  display: flex;
  gap: 3%;
}
.con2_a {
  width: 33.33%;
  padding: 10px 20px;
  display: flex;
  gap: 1%;
}
.con2_a h2 {
  font-size: 20px;
  font-weight: 500;
  line-height: 24px;
  font-family: dm-sans;
  color: #052e26;
  margin: 10px 0;
}
.con2_a p {
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
  font-family: dm-sans;
  color: #052e26;
  margin: 10px 0;
}
.icon {
  background-color: #f5f2f0;
  padding: 20px 20px;
  font-size: 40px;
  color: #052e26;
}
.con3 {
  height: 600px;
  background-image: url("../assets/image/map.png");
  background-size: cover;
  position: relative;
}
.con3_a {
  position: absolute;
  background-color: rgba(255, 255, 255, 0.9);
  padding: 15px;
  width: 30%;
  right: 10%;
  top: 30%;
  text-align: left;
}
.con3_a h1 {
  font-size: 30px;
  font-weight: 500;
  line-height: 36px;
  font-family: dm-sans;
  color: #052e26;
  margin: 15px 0;
  text-decoration: underline;
}
.con3_a address {
  font-size: 20px;
  font-weight: 400;
  line-height: 24px;
  font-family: dm-sans;
  color: #052e26;
  margin: 10px 0;
}
.con3_a ul li {
  list-style: square;
  margin-left: 20px;
  font-size: 20px;
  font-weight: 400;
  line-height: 24px;
  font-family: dm-sans;
  color: #052e26;
}
.con3_a p {
  font-size: 20px;
  font-weight: 400;
  line-height: 24px;
  font-family: dm-sans;
  color: #052e26;
  margin: 10px 0;
}
@media only screen and (max-width: 1350px) {
  .con1_a h1 {
    font-size: 37px;
    font-weight: 300;
    line-height: 36px;
    margin: 10px 0;
  }
  textarea {
    max-width: 100%;
    height: 50px;
  }
  .con1 img {
    width: 100%;
    height: 70vh;
  }
}
@media only screen and (max-width: 990px) {
  .con1 {
    flex-direction: column;
  }
  .con1_a {
    width: 100%;
  }
  .con1_b {
    width: 100%;
  }
  .con1 img {
    width: 100%;
  }
  .con2 {
    flex-direction: column;
  }
  .con2_a {
    width: 100%;
  }
  .con3_a {
    width: 70%;
  }
}
</style>
