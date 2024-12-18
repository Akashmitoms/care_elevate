<template>
  <pop-up v-if="togglePopup">
    <div class="pop_up">
      <div class="close" @click="close">
        <font-awesome-icon :icon="['fas', 'xmark']" />
      </div>
      <h2>Contact details</h2>
      <div class="input_pop">
        <input
          v-model="formData.name"
          type="text"
          placeholder="Your Name"
          onfocus="this.placeholder = ''"
          onblur="this.placeholder = 'Your Name'"
        />

        <input
          v-model="formData.phone"
          type="text"
          placeholder="Phone Number"
          onfocus="this.placeholder = ''"
          onblur="this.placeholder = 'Phone Number'"
        />

        <input
          v-model="formData.email"
          type="email"
          placeholder="Email Address"
          onfocus="this.placeholder = ''"
          onblur="this.placeholder = 'Email Address'"
        />
      </div>
      <h2>How can we help?</h2>
      <div class="input_pop1">
        <input type="checkbox" v-model="formData.consultation" />
        <label for="">Consultation</label> <br />
        <input type="checkbox" v-model="formData.subscription" />
        <label for="">Subscription</label>
      </div>
      <div class="input_pop1">
        <input type="checkbox" v-model="formData.others" />
        <label for="">Others</label>
      </div>
      <h2>Additional information (optional)</h2>
      <div class="textarea_pop">
        <textarea
          v-model="formData.additionalInfo"
          name=""
          id=""
          cols="30"
          rows="5"
          placeholder="Anything else you would like us to know?"
          onfocus="this.placeholder = ''"
          onblur="this.placeholder = 'Anything else you would like us to know?'"
        />
      </div>
      <button
        class="input_btn"
        :class="{ loading: isSubmitting }"
        @click="submitForm"
      >
        Submit Request
        <span v-if="isSubmitting" class="loader"></span>
      </button>
    </div>
  </pop-up>
  <header>
    <div class="head1">
      <div @click="$router.push('/')">
        <img src="../assets/image/logo_3 - Copy.png" alt="" />
      </div>
      <div class="head2">
        <ul>
          <li><router-link to="/" class="link">Home</router-link></li>
          <li>
            <router-link to="/financial-clinic" class="link"
              >Financial Clinic</router-link
            >
          </li>
          <li>
            <router-link to="/calculators" class="link"
              >Calculators</router-link
            >
          </li>
          <li>
            <router-link to="/my-journey" class="link">My Journey</router-link>
          </li>
          <!-- <li>My Club</li> -->
          <li><router-link to="/contact" class="link">Contact</router-link></li>
        </ul>
      </div>
    </div>

    <div class="btn_div">
      <button class="btn_a" @click="open">Free consultation</button>
      <button class="btn_b" @click="$router.push('/my-journey')">
        Get Started
      </button>
    </div>
  </header>
</template>

<script>
// import axios from "axios";

export default {
  data() {
    return {
      togglePopup: false,
      formData: {
        name: "",
        phone: "",
        email: "",
        consultation: false,
        subscription: false,
        others: false,
        additionalInfo: "",
      },
    };
  },
  methods: {
    close() {
      this.togglePopup = false;
    },
    open() {
      this.togglePopup = true;
    },
    async submitForm() {
      try {
        const response = await axios.post(
          "mail/send_email_consulatation.php",
          this.formData
        );
        alert(response.data.message);
        this.close(); // Close the popup after submission
      } catch (error) {
        console.error(error);
        alert("An error occurred. Please try again.");
      }
    },
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
header {
  display: flex;
  justify-content: space-between;
  padding: 10px 0;
  position: sticky;
  top: 0;
  background-color: white;
  z-index: 1;
}
.head1 {
  display: flex;
  cursor: pointer;
}
.head2 {
  padding-top: 36px;
  /* border: 1px solid red; */
}
.head1 img {
  width: 110px;
  margin-left: 120px;
}
.head2 ul li {
  display: inline;
  padding: 0 10px;
  font-family: dm-sans;
  color: #052e26;
  font-size: 20px;
  list-style: none;
  cursor: pointer;
}
.btn_a {
  background-color: #f5f2f0;
  padding: 15px 30px;
  margin: 20px;
  font-size: 16px;
  cursor: pointer;
  border: none;
}
.btn_a:hover {
  background-color: white;
  border: 1px solid black;
}
.btn_b {
  background-color: black;
  color: white;
  padding: 15px 30px;
  margin: 20px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.btn_b:hover {
  background-color: white;
  color: black;
  border: 1px solid black;
}
.link {
  text-decoration: none;
  padding: 0 10px;
  font-family: dm-sans;
  color: #052e26;
  font-size: 20px;
  list-style: none;
  cursor: pointer;
}
.pop_up {
  position: fixed;
  top: 50%;
  left: 50%;
  width: 90%;
  max-width: 500px; /* Limits the popup width */
  padding: 20px;
  padding-top: 60px; /* Adjusted to create space for the close button */
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  transform: translate(-50%, -50%);
  z-index: 1001; /* Ensure it’s above other elements */
  overflow-y: auto; /* Ensure the content is scrollable if it exceeds the height */
  max-height: 80vh; /* Prevents the popup from becoming too tall */
}

.close {
  position: absolute;
  top: 10px; /* Position it at the top of the popup */
  right: 20px; /* Adjust this value to position it correctly within the popup */
  cursor: pointer;
  font-size: 20px;
  color: #052e26;
  z-index: 1002; /* Ensure it’s above the popup content */
}

.pop_up h2 {
  font-size: 25px;
  font-weight: 500;
  font-family: dm-sans;
  text-align: left;
  color: black;
  margin: 20px 0;
}

.input_pop input {
  display: block;
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: none;
  border: 1px solid gray;
  background-color: transparent;
}

.input_pop input::placeholder {
  color: #052e26;
  opacity: 1;
}

.input_pop input:focus {
  border: 2px solid black;
  outline: none;
}

.input_pop1 input {
  display: inline;
  margin: 10px 5px 10px 10px;
}

.textarea_pop textarea {
  display: block;
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: none;
  border: 1px solid gray;
  background-color: transparent;
}

.textarea_pop ::placeholder {
  color: black;
  opacity: 1;
}

/* .input_pop1 input {
  display: inline;
  margin: 10px 5px 10px 10px;
} */

@media only screen and (max-width: 1350px) {
  .btn_div {
    display: none;
  }
  .head1 img {
    width: 110px;
    margin-left: 0px;
  }
  header {
    padding-left: 10%;
  }
}
</style>
