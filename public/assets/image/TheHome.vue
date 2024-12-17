<template>
  <section class="section1">
    <div class="sec1">
      <div class="sec1_sub_a">
        <h1>Build a financially sustainable future for your loved ones.</h1>
        <br />
        <p>
          Unlock success with tailored financial consulting solutions for your business growth.
        </p>
        <div>
          <button class="btn_b">Free Consultation</button>
          <span class="video">
            <span class="video_a"><font-awesome-icon :icon="['fas', 'caret-right']" /></span>
            <span>Watch video</span>
          </span>
        </div>
      </div>
      <div class="sec1_sub_b">
        <div class="slider">
          <img v-for="(image, index) in images" :key="index" :src="image" alt="" :class="{ active: index === currentIndex }"/>
        </div>
      </div>
    </div>
  </section>
  <section class="section2">
    <h1 class="head_line">Why You'll Love Us</h1>
    <div class="sec2">
      <div class="sec2_a">
      <span class="icon_2"><font-awesome-icon :icon="['fas', 'chart-line']" /></span>
      <h2>Your Financial Health Matters</h2>
      <p>We prioritise your genuine needs over pushing high-commission products.</p>
    </div>
    <div class="sec2_a">
      <span class="icon_2"><font-awesome-icon :icon="['fas', 'list-check']" /></span>
      <h2>Consult, Don't Buy</h2>
      <p>Pay only for expert advice, no forced product purchases.</p>
    </div>
    <div class="sec2_a">
      <span class="icon_2"><font-awesome-icon :icon="['fas', 'sliders']" /></span>
      <h2>Tailored To You</h2>
      <p>Tailored recommendations for your financial goals, no more one-size-fits-all.</p>
    </div>
    </div>
    <div class="sec2">
      <div class="sec2_a">
      <span class="icon_2"><font-awesome-icon :icon="['fas', 'flag-checkered']" /></span>
      <h2>Family-Style Financial Care</h2>
      <p>Guiding you responsibly toward your dreams, just like family.</p>
    </div>
    <div class="sec2_a">
      <span class="icon_2"><font-awesome-icon :icon="['fas', 'circle-check']" /></span>
      <h2>Expert Advice, Not Peer Pressure</h2>
      <p>Trust our expertise over misinformed advice. We'll secure the right loan rates and investments for you.</p>
    </div>
    <div class="sec2_a">
      <span class="icon_2"><font-awesome-icon :icon="['fas', 'shield-heart']" /></span>
      <h2>Products You Can Trust</h2>
      <p>Besides consultations, we provide a range of products. Choose what fits, ensuring trust and transparency.</p>
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
      <p>Identify income<br />opportunities, and amplify<br />its use towards your goals</p>
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
      <p>Evaluate your investments<br />and make adjustments<br />achieving risk-free returns.</p>
    </div>
    <div class="sec3_a" @click="goToFinancialClinic">
      <span class="sec3_icon">
        <font-awesome-icon :icon="['fas', 'file-circle-plus']" />
      </span>
      <h2>Insurances</h2>
      <p>Protect your priceless life<br />and health in these<br />unprecedented times.</p>
    </div>
    <div class="sec3_a" @click="goToFinancialClinic">
      <span class="sec3_icon">
        <font-awesome-icon :icon="['fas', 'coins']" />
      </span>
      <h2>Taxes</h2>
      <p>Leave no stone unturned in<br />leading the most tax<br />efficient life.</p>
    </div>
  </div>
</section>

  <section class="section2">
    
    <div class="sec4">
      <div class="sec4_a">
        <h1 class="about_line">About US</h1>
        <p>
          Welcome to BUDZEECO, where your financial well-being is our priority. With years of expertise, we provide tailored insurance and financial solutions designed to protect your future and help you achieve your financial goals. Our dedicated team is committed to delivering personalized service, innovative strategies, and reliable support. Trust us to be your partner in navigating the complexities of financial planning, ensuring peace of mind and financial security for you and your loved ones.</p></div>
      <div class="sec4_b"><img src="../assets/image/about-us2.jpg" alt=""></div>
    </div>
  </section>
  <section class="section4">
    <div class="sec5">
      <div class="sec5_a"><img src="../assets/image/plant-grow.jpg" alt=""></div>
      <div class="sec5_b">
        <h2>Why We're Here</h2>
        <p>Navigating the financial world can be overwhelming. At BUDZEECO, we simplify this journey by empowering you with knowledge and transparency. Our mission is to help you make informed decisions confidently, ensuring you receive the guidance and support needed to thrive in a complex financial environment.

</p>
      </div>
    </div>
  </section>
  <section class="section4">
    <div class="sec5">
      <div class="sec5_b">
        <h2>How We Thrive</h2>
        <p>We succeed by providing honest, transparent advice. You choose us for our commitment to truth in a sea of misinformation. Our success is built on earning your trust through integrity and clear guidance, ensuring you always receive straightforward and reliable support.</p>
      </div>
      <div class="sec5_c"><img src="../assets/image/money-graph.avif" alt=""></div>
    </div>
  </section>
  <section class="section5">
    <div class="sec6">
      <div class="sec6_a">
        <h5>Let's connect</h5>
        <h1>We’re here to help</h1>
        <p>Need help with a project, have a question about our work? We’re here.</p>
        <input v-model="name" type="text" placeholder="Name" class="input"><br>
        <input v-model="email" type="email" placeholder="Email Address" class="input"><br>
        <textarea v-model="message" cols="30" rows="10" placeholder="Message" class="input"></textarea>
        <button @click="submitForm" class="input_btn">Submit</button>
      </div>
      <div class="sec6_b"><img src="../assets/image/business-cta.jpg" alt=""></div>
    </div>
  </section>
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      message: '',
      images: [
        '../assets/image/front_slide.jpg',
        '../assets/image/front_slide2.jpg', // Add more image paths as needed
        
      ],
      currentIndex: 0
    };
  },
  methods: {
    async submitForm() {
      const formData = new FormData();
      formData.append('name', this.name);
      formData.append('email', this.email);
      formData.append('message', this.message);

      try {
        const response = await axios.post('mail/send_email.php', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });
        alert(response.data.message);
      } catch (error) {
        console.error(error);
        alert('An error occurred. Please try again.');
      }
    },
    goToFinancialClinic() {
      this.$router.push({ name: 'FinancialClinic' });
    },
    startSlider() {
      setInterval(() => {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
      }, 3000); // Change image every 3 seconds
    }
  },
  mounted() {
    this.startSlider();
  }
};
</script>

<style scoped>

@import '../assets/CSS/home.css';

.sec1_sub_b {
  position: relative;
  overflow: hidden;
}

.slider {
  position: relative;
}

.slider img {
  position: absolute;
  width: 100%;
  height: auto;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.slider img.active {
  opacity: 1;
}
</style>


