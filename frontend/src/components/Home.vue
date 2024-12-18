<template>
  <section class="section1">
    <div class="sec1">
      <div class="sec1_sub_a">
        <h1>Build a financially sustainable future for your loved ones.</h1>
        <p>
          Unlock success with tailored financial consulting solutions for
          secured future.
        </p>
        <div class="video_btn">
          <button class="btn_b" @click="open">Free Consultation</button>
          <span class="video" @click="openVideo">
            <span class="video_a">
              <font-awesome-icon :icon="['fas', 'caret-right']" />
            </span>
            <span>Watch video</span>
          </span>
        </div>
      </div>
      <div class="sec1_sub_b">
        <div class="slider">
          <img
            v-for="(image, index) in images"
            :key="index"
            :src="image"
            alt=""
            :class="{ active: index === currentIndex }"
          />
        </div>
      </div>
    </div>
  </section>
  <!-- Video Modal -->
  <div v-if="showVideo" class="video-modal" @click="closeVideo">
    <div class="video-container" @click.stop>
      <span class="close-video" @click="closeVideo"
        ><font-awesome-icon :icon="['fas', 'xmark']"
      /></span>
      <iframe
        width="100%"
        height="100%"
        :src="videoSrc"
        title="Video"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
  </div>
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
  <section class="section2">
    <h1 class="head_line">Why You'll Love Us</h1>
    <div class="sec2">
      <div class="sec2_a">
        <span class="icon_2"
          ><font-awesome-icon :icon="['fas', 'chart-line']"
        /></span>
        <h2>Your Financial Health Matters</h2>
        <p>
          We prioritise your genuine needs over pushing high-commission
          products.
        </p>
      </div>
      <div class="sec2_a">
        <span class="icon_2"
          ><font-awesome-icon :icon="['fas', 'list-check']"
        /></span>
        <h2>Consult, Don't Buy</h2>
        <p>Pay only for expert advice, no forced product purchases.</p>
      </div>
      <div class="sec2_a">
        <span class="icon_2"
          ><font-awesome-icon :icon="['fas', 'sliders']"
        /></span>
        <h2>Tailored To You</h2>
        <p>
          Tailored recommendations for your financial goals, no more
          one-size-fits-all.
        </p>
      </div>
    </div>
    <div class="sec2">
      <div class="sec2_a">
        <span class="icon_2"
          ><font-awesome-icon :icon="['fas', 'flag-checkered']"
        /></span>
        <h2>Family-Style Financial Care</h2>
        <p>Guiding you responsibly toward your dreams, just like family.</p>
      </div>
      <div class="sec2_a">
        <span class="icon_2"
          ><font-awesome-icon :icon="['fas', 'circle-check']"
        /></span>
        <h2>Expert Advice, Not Peer Pressure</h2>
        <p>
          Trust our expertise over misinformed advice. We'll secure the right
          loan rates and investments for you.
        </p>
      </div>
      <div class="sec2_a">
        <span class="icon_2"
          ><font-awesome-icon :icon="['fas', 'shield-heart']"
        /></span>
        <h2>Products You Can Trust</h2>
        <p>
          Besides consultations, we provide a range of products. Choose what
          fits, ensuring trust and transparency.
        </p>
      </div>
    </div>
  </section>

  <section class="section3">
    <h2 class="head_line_b">Holistic Care</h2>
    <div class="sec3">
      <div class="sec3_a" @click="goToFinancialClinic">
        <span class="sec3_icon">
          <font-awesome-icon :icon="['fas', 'file-invoice-dollar']" />
        </span>
        <h2>Incomes</h2>
        <p>
          Identify income<br />opportunities, and amplify<br />its use towards
          your goals
        </p>
      </div>
      <div class="sec3_a" @click="goToFinancialClinic">
        <span class="sec3_icon">
          <font-awesome-icon :icon="['fas', 'wallet']" />
        </span>
        <h2>Expenses</h2>
        <p>Compare your costs, cut<br />costs and optimise your<br />life.</p>
      </div>
      <div class="sec3_a" @click="goToFinancialClinic">
        <span class="sec3_icon">
          <font-awesome-icon :icon="['fas', 'sack-dollar']" />
        </span>
        <h2>Investments</h2>
        <p>
          Evaluate your investments<br />and make adjustments<br />achieving
          risk-free returns.
        </p>
      </div>
      <div class="sec3_a" @click="goToFinancialClinic">
        <span class="sec3_icon">
          <font-awesome-icon :icon="['fas', 'file-circle-plus']" />
        </span>
        <h2>Insurances</h2>
        <p>
          Protect your priceless life<br />and health in these<br />unprecedented
          times.
        </p>
      </div>
      <div class="sec3_a" @click="goToFinancialClinic">
        <span class="sec3_icon">
          <font-awesome-icon :icon="['fas', 'coins']" />
        </span>
        <h2>Taxes</h2>
        <p>
          Leave no stone unturned in<br />leading the most tax<br />efficient
          life.
        </p>
      </div>
    </div>
  </section>

  <section class="section2">
    <div class="sec4">
      <div class="sec4_a">
        <h1 class="about_line">About US</h1>
        <p>
          Budzeeco offers comprehensive personal finance and investment
          solutions with unbiased advisory services. We provide financial
          planning, investment management, retirement planning, tax
          optimization, and insurance advisory. Our team ensures personalized,
          transparent, and expert support. We offer continuous assistance and
          educational resources. Choose Budzeeco for a secure and informed
          financial future.
        </p>
      </div>
      <div class="sec4_b">
        <img src="../assets/image/about-us2.jpg" alt="" />
      </div>
    </div>
  </section>
  <section class="section4">
    <div class="sec5">
      <div class="sec5_a">
        <img src="../assets/image/plant-grow.jpg" alt="" />
      </div>
      <div class="sec5_b">
        <h2>Why We're Here</h2>
        <p>
          Navigating the financial world can be overwhelming. At BUDZEECO, we
          simplify this journey by empowering you with knowledge and
          transparency. Our mission is to help you make informed decisions
          confidently, ensuring you receive the guidance and support needed to
          thrive in a complex financial environment.
        </p>
      </div>
    </div>
  </section>
  <section class="section2">
    <h2 class="head_line">How We Thrive</h2>
    <div class="carousel">
      <div class="carousel-inner">
        <FlipCard
          v-for="(card, index) in cards"
          :key="cards.id"
          :flipped="activeCard === index"
          @flip="flipCard(index)"
        >
          <template #front>
            <!-- Front content for the card -->
            {{ card.front }}
          </template>
          <template #back>
            <!-- Back content for the card -->
            {{ card.back }}
          </template>
        </FlipCard>
      </div>
    </div>

    <div class="carousel">
      <div class="carousel-inner">
        <FlipCard
          v-for="(card, index) in cardsTwo"
          :key="index"
          :flipped="activeCard === index"
          @flip="flipCard(index)"
        >
          <template #front>
            <!-- Front content for the card -->
            {{ card.front }}
          </template>
          <template #back>
            <!-- Back content for the card -->
            {{ card.back }}
          </template>
        </FlipCard>
      </div>
    </div>
  </section>
  <section class="section5">
    <div class="sec6">
      <div class="sec6_a">
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
        <button @click="submitFormContact" class="input_btn">Submit</button>
      </div>
      <div class="sec6_b">
        <img src="../assets/image/contact-us.jpg" alt="" />
      </div>
    </div>
  </section>
</template>
<script>
// import axios from "axios";
// import FlipCard from "./ButtonComponent/FlipCard.vue";

export default {
  data() {
    return {
      togglePopup: false,
      showVideo: false,
      videoSrc: "../assets/video/video.mp4",
      formData: {
        name: "",
        phone: "",
        email: "",
        consultation: false,
        subscription: false,
        others: false,
        additionalInfo: "",
      },
      name: "",
      email: "",
      message: "",
      images: [
        "../assets/image/front_slide.jpg",
        "../assets/image/front_slide2.jpg", // Add more image paths as needed
      ],
      currentIndex: 0,
      cards: [
        {
          id: "1",
          front: "Non-Biased Advisory",
          back: "At Budzeeco, we pride ourselves on providing objective and unbiased financial advice. Our advisory services are not influenced by commissions or partnerships with financial product providers, ensuring that our recommendations are always in your best interest.",
        },
        {
          id: "2",
          front: "Comprehensive Financial Planning",
          back: "We offer detailed financial planning services that cover budgeting, saving, debt management, retirement planning, and more. Our goal is to create a personalized financial plan that aligns with your short-term and long-term objectives.",
        },
        {
          id: "3",
          front: "Investment Management",
          back: "Our investment management services include portfolio analysis, risk assessment, and asset allocation. We help you build a diversified portfolio tailored to your risk tolerance and financial goals, utilizing a mix of traditional and alternative investments.",
        },
        {
          id: "4",
          front: "Retirement Planning",
          back: "Planning for retirement can be complex. Budzeeco simplifies this process by providing strategies to maximize your retirement savings, ensuring you have a steady income stream post-retirement",
        },
      ],
      cardsTwo: [
        {
          id: "1",
          front: "Tax Optimization",
          back: "Our tax experts help you navigate the complexities of tax laws, identifying opportunities for tax savings and ensuring compliance with all regulations.",
        },
        {
          id: "2",
          front: "Insurance Advisory",
          back: "We offer guidance on selecting the right insurance policies to protect your assets and loved ones. Our advisors help you choose from health, life, disability, and property insurance options that fit your needs and budget.",
        },
        {
          id: "3",
          front: "Education and Resources",
          back: "We believe in empowering our clients through knowledge. Budzeeco provides a wealth of educational resources, including webinars, articles, and workshops on various financial topics.",
        },
        {
          id: "4",
          front: "Ongoing Support",
          back: "Financial management is an ongoing process. We offer continuous support and regular reviews of your financial plan and investment portfolio to ensure they remain aligned with your changing circumstances and goals.",
        },
      ],
      activeCard: null,
    };
  },
  components: {
    // FlipCard,
  },
  methods: {
    // flipCard(index) {
    //   if (this.activeCard === index) {
    //     this.activeCard = null;
    //   } else {
    //     this.activeCard = index;
    //   }
    // },
    close() {
      this.togglePopup = false;
      this.resetForm();
    },
    openVideo() {
      this.showVideo = true;
    },
    closeVideo() {
      this.showVideo = false;
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
    async submitFormContact() {
      this.isSubmitting = true; // Start loader
      try {
        const response = await axios.post("mail/send_email.php", {
          name: this.name,
          email: this.email,
          message: this.message,
        });
        alert(response.data.message);
        this.resetForm();
      } catch (error) {
        console.error(error);
        alert("An error occurred. Please try again.");
      } finally {
        this.isSubmitting = false; // Stop loader
      }
    },
    goToFinancialClinic() {
      this.$router.push({ name: "FinancialClinic" });
    },
    startSlider() {
      setInterval(() => {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
      }, 3000); // Change image every 3 seconds
    },
    resetForm() {
      // Reset the form data to its initial state
      this.formData = {
        name: "",
        phone: "",
        email: "",
        consultation: false,
        subscription: false,
        others: false,
        additionalInfo: "",
      };
      this.name = "";
      this.email = "";
      this.message = "";
    },
  },
  mounted() {
    this.startSlider();
  },
};
</script>

<style scoped>
@import "../assets/CSS/home.css";

.video-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.video-container {
  position: relative;
  width: 90%;
  max-width: 800px;
  height: 0;
  padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
}

.close-video {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  color: white;
  font-size: 24px;
  z-index: 1001;
}

iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.sec1 {
  display: flex;
  flex-direction: row; /* Default layout for larger screens */
  height: 100vh;
}

/* .sec1_sub_a,
.sec1_sub_b {
  flex: 1;
} */
.loader {
  border: 4px solid #f3f3f3; /* Light grey */
  border-top: 4px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 20px;
  height: 20px;
  animation: spin 2s linear infinite;
  display: inline-block;
  vertical-align: middle;
  margin-left: 10px;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

button.loading {
  position: relative;
  pointer-events: none;
  opacity: 0.7;
}

button.loading .loader {
  display: inline-block;
}
.sec1_sub_a {
  padding: 20px;
  margin: auto 5px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: left;
}

.sec1_sub_b {
  position: relative;
  overflow: hidden;
}

.slider {
  position: relative;
  width: 100%;
  height: 100%;
}

.slider img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.slider img.active {
  opacity: 1;
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

.carousel {
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.carousel-inner {
  display: flex;
  width: 100%;
}

.flip-card {
  width: 23%;
  height: 250px;
  margin: 1%;
}

/* Mobile (max-width: 767px) */
@media only screen and (max-width: 767px) {
  .video_a {
    margin-left: -10px;
  }
  .sec1 {
    display: flex;
    flex-direction: column;
    width: 100vw; /* Ensure full browser width */
    height: 120vh; /* Ensure combined height of content and slider */
    margin: 0;
    padding: 0;
  }
  .section1 {
    padding: 1%;
  }
  .sec1_sub_a {
    order: 1; /* Content comes first */
    width: 100%; /* Full width */
    display: block;
    padding: 20px 0;
  }
  .sec1_sub_b {
    order: 2; /* Slider comes after content */
    width: 100%; /* Full width */
    height: inherit;
  }
  .sec1_sub_a h1 {
    font-size: 25px;
    line-height: 40px;
    margin-bottom: 10%;
  }
  .carousel-inner {
    display: block;
  }
  .flip-card {
    width: 100%;
    margin: 5% 0;
  }
  .slider {
    height: 100vh; /* Full viewport height */
  }

  .slider img {
    object-fit: cover; /* Ensure image covers the container */
  }
  .sec6_a h1 {
    font-size: 35px;
  }
  .pop_up {
    width: 90%;
    padding: 15px;
    max-height: 80vh; /* Adjust height for mobile */
  }

  .close {
    font-size: 18px;
  }
}

/* Tablet/iPad (min-width: 768px and max-width: 1024px) */
@media only screen and (min-width: 768px) and (max-width: 1024px) {
  .sec1 {
    flex-direction: row;
    align-items: center; /* Aligns items vertically center */
    justify-content: space-between; /* Ensures slider stays right of content */
    height: 100vh; /* Ensure full viewport height */
  }
  .carousel-inner {
    display: block;
  }
  .flip-card {
    width: 100%;
    margin: 5% 0;
  }
  .sec1_sub_a {
    order: 1; /* Content comes first */
    width: 100%; /* Full width */
    display: block;
    padding: 20px 0;
  }
  .sec1_sub_b {
    order: 2; /* Slider comes after content */
    width: 100%; /* Full width */
    height: 100vh;
  }

  .slider {
    height: 100%; /* Ensure the slider height matches the content height */
  }

  .slider img {
    object-fit: cover; /* Ensure image covers the container */
  }

  .pop_up {
    width: 80%;
    padding: 20px;
    max-height: 80vh;
  }

  .close {
    font-size: 20px;
  }
}

/* Laptop/Desktop (min-width: 1025px) */
@media only screen and (min-width: 1025px) {
  .sec1 {
    flex-direction: row;
    height: 100vh;
  }

  .sec1_sub_a {
    order: 1; /* Content comes first */
    width: 100%; /* Full width */
    display: block;
    padding: 20px 0;
  }
  .sec1_sub_b {
    order: 2; /* Slider comes after content */
    width: 100%; /* Full width */
    height: inherit;
  }

  .slider {
    height: 100%;
  }

  .slider img {
    object-fit: cover; /* Ensure image covers the container */
  }

  .pop_up {
    width: 500px;
    padding: 20px;
    max-height: 80vh;
  }

  .close {
    font-size: 22px;
  }
}

/* Additional Styles */
@media only screen and (max-width: 1500px) {
  .about_line {
    margin: 2% 0;
  }
  .sec1_sub_a {
    order: 1; /* Content comes first */
    width: 100%; /* Full width */
    display: block;
    padding: 20px 0;
  }
  .sec1_sub_b {
    order: 2; /* Slider comes after content */
    width: 100%; /* Full width */
    height: inherit;
  }
}

@media only screen and (max-width: 1350px) {
  .sec1 {
    display: flex;
    flex-direction: column;
  }

  .sec4_a {
    padding-right: 1%;
  }

  .sec4_a p {
    font-size: 16px;
    margin: 2% 0;
  }

  .about_line {
    font-size: 30px;
  }

  .sec5 {
    display: flex;
    flex-direction: column;
  }

  .sec5_a,
  .sec5_b {
    width: 100%;
  }
  .sec1_sub_a {
    order: 1; /* Content comes first */
    width: 100%; /* Full width */
    display: block;
    padding: 20px 0;
  }
  .sec1_sub_b {
    order: 2; /* Slider comes after content */
    width: 100%; /* Full width */
    height: inherit;
  }
}

@media only screen and (max-width: 990px) {
  .sec2 {
    display: flex;
    flex-direction: column;
  }

  .sec2_a {
    width: 100%;
  }

  .sec3 {
    display: flex;
    flex-direction: column;
  }

  .sec3_a {
    width: 100%;
  }

  .sec4 {
    display: flex;
    flex-direction: column;
  }

  .sec4_a,
  .sec4_b {
    width: 100%;
  }

  .sec6 {
    display: flex;
    flex-direction: column-reverse;
  }

  .sec6_a,
  .sec6_b {
    width: 100%;
  }
}
</style>
