<template>
  <!-- Initial Diagnostics Popup -->
  <pop-up v-if="togglePopup">
    <div class="popup">
      <div class="close_btn" @click="close">
        <font-awesome-icon :icon="['fas', 'xmark']" />
      </div>
      <h1>Quick Financial Diagnostics</h1>
      <p class="head_line_pb">
        Begin your financial journey by assessing your current situation and
        mapping the path to achieve your dreams. Share your details below to
        kickstart your road to financial freedom!
      </p>
      <div class="popup_field">
        <label for="income">Enter Your Monthly Income</label>
        <span class="value_pop">{{ formattedIncome }}</span>
      </div>
      <input
        type="range"
        v-model="monthlyIncome"
        min="0"
        max="1000000"
        step="10000"
        @input="updateIncomeValue"
      />
      <br />

      <div class="popup_field">
        <label for="expense">Enter Your Monthly Expense</label>
        <span class="value_pop">{{ formattedExpense }}</span>
      </div>
      <input
        type="range"
        v-model="monthlyExpense"
        min="0"
        max="1000000"
        step="10000"
        @input="updateExpenseValue"
      />
      <br />

      <div class="popup_field">
        <label for="age">Enter Your Age</label>
        <span class="value_pop">{{ age }}</span>
      </div>
      <input
        type="range"
        v-model="age"
        min="18"
        max="100"
        step="1"
        @input="updateAgeValue"
      />
      <br />

      <div class="popup_field">
        <label for="retirement">When would you want to retire?</label>
        <span class="value_pop">{{ retirementAge }}</span>
      </div>
      <input
        type="range"
        v-model="retirementAge"
        min="50"
        max="70"
        step="1"
        @input="updateRetirementValue"
      />
      <br />

      <div class="pop_check">
        <label for=""
          >Do you have a Loan?<input type="checkbox" v-model="hasLoan"
        /></label>
        <span v-if="hasLoan" class="value_pop">{{ formattedEmi }}</span>
        <input
          v-if="hasLoan"
          type="range"
          v-model="monthlyEmi"
          min="0"
          max="1000000"
          step="10000"
          @input="updateEmiValue"
        />
      </div>

      <div class="pop_check">
        <label for=""
          >Do you have Term Insurance?<input
            type="checkbox"
            v-model="hasTermInsurance"
        /></label>
      </div>

      <div class="pop_check">
        <label for=""
          >Do you have Health Insurance?<input
            type="checkbox"
            v-model="hasHealthInsurance"
        /></label>
      </div>

      <div class="pop_check">
        <label for=""
          >Do you have Investments?<input
            type="checkbox"
            v-model="hasInvestments"
        /></label>
      </div>

      <br />
      <button @click="generateReport" class="input_btn">
        Start my diagnostics
      </button>
    </div>
  </pop-up>

  <!-- Report Popup -->
  <pop-up v-if="showReport">
    <div class="popup">
      <div class="close_btn" @click="closeReport">
        <font-awesome-icon :icon="['fas', 'xmark']" />
      </div>
      <br />
      <h1>Financial Diagnostics Report</h1>
      <div
        v-for="(section, index) in reportSections"
        :key="index"
        class="report_section"
      >
        <h2>{{ section.title }}</h2>
        <p>Rating: {{ section.rating }}/5</p>
        <p>Remarks: {{ section.remarks }}</p>
      </div>
      <button @click="closeReport" class="input_btn">Close</button>
    </div>
  </pop-up>

  <section class="section6">
    <h1 class="head_line">Financial diagnostics</h1>
    <div class="fin1">
      <div class="fin1_a">
        <div class="slide_div">
          <span class="slide_div_con_a">
            <h2>Investments</h2>
            <h3>+3.1%</h3>
            <p>3 Actions pending</p>
            <h4>*Since last month</h4>
          </span>
          <span class="slide_con_b">
            <font-awesome-icon :icon="['fas', 'money-bill-trend-up']" />
          </span>
        </div>
        <div class="fin1_a_con">
          <h2>Financial diagnostics</h2>
          <p>Unlock your financial diagnostic report</p>
          <button class="input_btn" @click="open">Start my diagnostics</button>
        </div>
      </div>
      <div class="fin1_b">
        <h1>Discuss all your queries</h1>
        <img
          src="../../public/assets/image/admin2-fotor.jpg"
          width="150px"
          alt=""
        />
        <h2>Advisors in every metro city</h2>
        <button class="input_btn" @click="$router.push('/personal-consultant')">
          Book an expert appointment
        </button>
      </div>
    </div>
  </section>

  <section class="section2">
    <h2 class="head_line">Check If Your Goals Are Possible</h2>
    <div class="slider-container">
      <div
        class="slider"
        :style="{
          transform: `translateX(-${currentSlide * (100 / slidesToShow)}%)`,
        }"
      >
        <div
          v-for="(slide, index) in slides"
          :key="index"
          :class="[
            'slide',
            {
              visible:
                index >= currentSlide && index < currentSlide + slidesToShow,
            },
          ]"
        >
          <div class="fin2_con" @click="$router.push('/contact')">
            <img :src="`../assets/${slide.image}`" :alt="slide.alt" />
            <h3>{{ slide.caption }}</h3>
            <p>{{ slide.description }}</p>
          </div>
        </div>
      </div>
      <!-- <button class="prev" @click="prevSlide">❮</button>
      <button class="next" @click="nextSlide">❯</button> -->
    </div>
  </section>
  <section class="section4">
    <div class="fin3">
      <div class="fin3_a">
        <p>Help center</p>
        <h2>Got a question? <br />Get your answer</h2>
        <br />
        <h3>
          Quick answers to questions you may have. Can't find <br />what you're
          looking for? Get in touch with us.
        </h3>
        <button class="btn_b" @click="$router.push('/contact')">
          Get in touch
        </button>
      </div>
      <div class="fin3_b">
        <div class="faq" v-for="(faq, key) in faqs" :key="key">
          <div @click="onFaqSelected(key)" class="faq_q">
            <h3>{{ faq.question }}</h3>
            <font-awesome-icon :icon="faq.selected ? 'fa-minus' : 'fa-plus'" />
          </div>
          <transition name="fade">
            <div v-if="faq.selected" class="faq_an">
              <p>{{ faq.answer }}</p>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "FinancialClinic",
  data() {
    return {
      togglePopup: false,
      showReport: false, // New state to control the report popup visibility
      monthlyIncome: 0, // New data for monthly income
      monthlyExpense: 0, // New data for monthly expense
      age: 18, // New data for age
      retirementAge: 50, // New data for retirement age
      hasLoan: false, // New data to track if user has a loan
      monthlyEmi: 0, // New data for monthly EMI if user has a loan
      hasTermInsurance: false, // New data to track if user has term insurance
      hasHealthInsurance: false, // New data to track if user has health insurance
      hasInvestments: false, // New data to track if user has investments
      reportSections: [], // New data to store the generated report sections
      currentSlide: 0,
      slidesToShow: 3,
      slides: [
        {
          image: "image/dream-car4.jpg",
          alt: "Dream Car",
          caption: "Dream Car",
          description: "Achieve your dream of owning a car.",
        },
        {
          image: "image/marriage2.jpg",
          alt: "Marriage",
          caption: "Marriage",
          description: "Plan for a memorable wedding.",
        },
        {
          image: "image/dream-house.jpg",
          alt: "Dream House",
          caption: "Dream House",
          description: "Save for your dream house.",
        },
        {
          image: "image/travel3.jpg",
          alt: "Travel",
          caption: "Travel",
          description: "Explore the world with confidence.",
        },
        {
          image: "image/kids-school2.jpg",
          alt: "Kid's Schooling",
          caption: "Kid's Schooling",
          description: "Secure your child's education.",
        },
        {
          image: "image/marriage3.jpg",
          alt: "Kid's Marriage",
          caption: "Kid's Marriage",
          description: "Prepare for your kid's marriage.",
        },
        {
          image: "image/retirement-last.webp",
          alt: "Retirement",
          caption: "Retirement",
          description: "Plan for a comfortable retirement.",
        },
      ],
      faqs: [
        {
          question: "Can I retire before I am 60 years of age?",
          answer:
            "Fetch from goal plan if retirement is already planned. Else Fetch from retirement plan if already planned Run Goal Plan with existing goals or just retirement as goal for 60 as age of retirement",
          selected: false,
        },
        {
          question: "How do I improve my credit score?",
          answer:
            "Follow these simple steps: Set Reminders or Standing Instructions to Repay Loan EMIs on Time Clear all Credit Cards Dues on Time Check for Errors in your CIBIL Report Monitor your Co-signed, Guaranteed, or Joint Loan Accounts Regularly Choosing a Longer Repayment Tenure Avoid Multiple Credit Applications in Short Duration Trying to Maintain a Healthy Credit Mix Refrain from Closing Old Credit Card Accounts Trying to Increase your Credit Limit Avail Secured Credit Card",
          selected: false,
        },
        {
          question: "How can I increase my income?",
          answer:
            "Identify a relevant certification or skill enhancement program. Enroll in the program within the next month. Aim to complete the program within the next three months. Use this skill for adding more job responsibilities at your current job, and/or adding another stream of income",
          selected: false,
        },
        {
          question: "What is the best way to negotiate a salary increase?",
          answer:
            "Compile a list of your achievements and responsibilities. Arrange formal conversations with your managers to exchange your aspirations and the company's expectations from you. Build a time bound plan that leads to a desired salary increase.",
          selected: false,
        },
        {
          question:
            "Should I prioritise increasing my income or cutting expenses?",
          answer:
            "Identify three specific areas to cut expenses within the next two weeks. Research and apply for at least one additional income opportunity within the next month. Identify ways to plan for your Goals and that will show you what kind of net savings are needed.",
          selected: false,
        },
        {
          question: "What strategies can help me diversify my income streams?",
          answer:
            "Research and choose one additional income stream (e.g., freelancing, investing). Consider opportunities that are not in conflict with your day job. Consider opportunities that do not take time away from your day job. Set a goal to generate income from the new stream within the next three months. Set small repeatable targets, that you can scale with time and reinvestment.",
          selected: false,
        },
        {
          question: "How can I protect my income in case of unexpected events?",
          answer:
            "Research income protection or disability insurance options. Allocate funds to create or enhance your emergency fund within the next two months. You need to have at least 6 times of your expense as your emergency funds for unexpected events.",
          selected: false,
        },
        {
          question:
            "What percentage of my income should I save for retirement?",
          answer:
            "Use the Retirement calculator to determine target savings. Set up automatic contributions to a retirement account.",
          selected: false,
        },
        {
          question: "How can I invest my income to generate returns?",
          answer:
            "Treat savings like kids. Allow them to make more kids (investment returns). And the best returns come over a long period of time.",
          selected: false,
        },
        {
          question: "How can I reduce my monthly expenses?",
          answer:
            "Review your monthly budget. Separate your expenses as needs, wants and emergency expenses. Identify wants (good to have) expenses that can be cut. Negotiate bills or subscriptions for better rates. Identify discount options via deal platforms. Identify if you are making full use of the loyalty cards and credit cards you already have.",
          selected: false,
        },
        {
          question: "What's the best way to budget for irregular expenses?",
          answer:
            "Identify and categorise irregular expenses. Allocate a monthly contribution to a dedicated discretionary fund. Use budgeting apps to track and plan for these expenses.",
          selected: false,
        },
        {
          question:
            "How do I determine the right amount of life insurance coverage?",
          answer:
            "Assess current and future financial needs. Consider outstanding debts, funeral costs, and education expenses. Use the Life Insurance cover planner to arrive at the exact cover you need. Consult with a financial advisor for personalised guidance.",
          selected: false,
        },
        {
          question: "How can I save on auto insurance premiums?",
          answer:
            "Review multiple quotes from multiple insurers. Bundle auto and home insurance for potential discounts. Maintain a good driving record to qualify for lower rates.",
          selected: false,
        },
        {
          question: "How Can I lower my health insurance cost?",
          answer:
            "Research and find the best-value health insurance plans. Insurers often offer lower premiums for healthy habits. Cover multiple family members under one policy for potential savings. Assess your health coverage needs to avoid unnecessary expenses. Accumulate bonuses for every claim-free year. Stick with insurers offering renewal discounts. Share a percentage of the claim amount for lower premiums with Voluntary Co-Pay Option. Utilize insurer wellness programs and preventive check-up discounts. Some insurers provide potential premium discounts for online purchases. Ensure your preferred hospitals are in the insurer's network for cost benefits. Understand policy exclusions to avoid unexpected costs. Adjust coverage based on changing health needs to avoid overpaying. Check out government-backed health insurance schemes for cost-effective options. Some insurers offer discounts for longer policy tenures.",
          selected: false,
        },
      ],
    };
  },
  computed: {
    totalSlides() {
      return this.slides.length;
    },
    formattedIncome() {
      return new Intl.NumberFormat("en-IN", {
        style: "currency",
        currency: "INR",
      }).format(this.monthlyIncome);
    },
    formattedExpense() {
      return new Intl.NumberFormat("en-IN", {
        style: "currency",
        currency: "INR",
      }).format(this.monthlyExpense);
    },
    formattedEmi() {
      return new Intl.NumberFormat("en-IN", {
        style: "currency",
        currency: "INR",
      }).format(this.monthlyEmi);
    },
  },
  methods: {
    onFaqSelected(faq) {
      this.faqs[faq].selected = !this.faqs[faq].selected;
    },
    startSlider() {
      setInterval(() => {
        this.nextSlide();
      }, 5000); // Change slide every 5 seconds
    },
    prevSlide() {
      if (this.currentSlide === 0) {
        this.currentSlide = this.totalSlides - this.slidesToShow;
      } else {
        this.currentSlide--;
      }
    },
    nextSlide() {
      if (this.currentSlide >= this.totalSlides - this.slidesToShow) {
        this.currentSlide = 0;
      } else {
        this.currentSlide++;
      }
    },
    close() {
      this.togglePopup = false;
    },
    open() {
      this.togglePopup = true;
    },
    closeReport() {
      this.showReport = false;
    },
    updateSlidesToShow() {
      const width = window.innerWidth;
      if (width < 768) {
        this.slidesToShow = 1;
      } else if (width < 1024) {
        this.slidesToShow = 2;
      } else {
        this.slidesToShow = 3;
      }
    },
    updateIncomeValue() {
      this.formattedIncome = this.formatCurrency(this.monthlyIncome);
    },
    updateExpenseValue() {
      this.formattedExpense = this.formatCurrency(this.monthlyExpense);
    },
    updateAgeValue() {
      this.age = this.age;
    },
    updateRetirementValue() {
      this.retirementAge = this.retirementAge;
    },
    updateEmiValue() {
      this.formattedEmi = this.formatCurrency(this.monthlyEmi);
    },
    generateReport() {
      this.reportSections = [
        this.calculateProtection(),
        this.calculateIncome(),
        this.calculateLiability(),
        this.calculateInvestments(),
        this.calculateExpenses(),
      ];
      this.togglePopup = false;
      this.showReport = true;
    },
    calculateProtection() {
      let rating;
      let remarks;
      if (!this.hasTermInsurance && !this.hasHealthInsurance) {
        rating = 1;
        remarks =
          "Consider getting insurance to protect yourself and your family.";
      } else if (this.age < 50) {
        rating = 2;
        remarks =
          "You have some protection, but ensure it's adequate for your needs.";
      } else {
        rating = 3;
        remarks = "Good protection, review your policies regularly.";
      }
      return { title: "Protection", rating, remarks };
    },
    calculateIncome() {
      let rating;
      let remarks;
      if (this.age < 30) {
        rating = this.monthlyIncome >= 1000000 ? 3 : 2;
        remarks =
          rating === 3
            ? "You're doing well for your age. Continue growing your income."
            : "Consider ways to increase your income.";
      } else {
        rating = this.monthlyIncome >= 1000000 ? 4 : 3;
        remarks =
          rating === 4
            ? "Solid income, ensure you're saving and investing wisely."
            : "Focus on increasing your income or cutting unnecessary expenses.";
      }
      return { title: "Income", rating, remarks };
    },
    calculateLiability() {
      let rating;
      let remarks;
      const emiToIncomeRatio = this.monthlyEmi / this.monthlyIncome;
      if (emiToIncomeRatio >= 0.3) {
        rating = 2;
        remarks =
          "Your EMIs are taking up a significant portion of your income. Consider reducing your debt.";
      } else {
        rating = 4;
        remarks = "Your debt is manageable. Continue making regular payments.";
      }
      return { title: "Liability", rating, remarks };
    },
    calculateInvestments() {
      let rating;
      let remarks;
      if (this.hasInvestments) {
        rating = 4;
        remarks =
          "You're investing well. Diversify your portfolio to minimize risk.";
      } else {
        rating = 2;
        remarks = "Consider starting to invest to grow your wealth over time.";
      }
      return { title: "Investments", rating, remarks };
    },
    calculateExpenses() {
      let rating;
      let remarks;
      const expenseToIncomeRatio = this.monthlyExpense / this.monthlyIncome;
      if (expenseToIncomeRatio > 0.5) {
        rating = 2;
        remarks =
          "Your expenses are high compared to your income. Consider budgeting.";
      } else {
        rating = 4;
        remarks = "Your expenses are well managed.";
      }
      return { title: "Expenses", rating, remarks };
    },
  },
  mounted() {
    this.startSlider();
    this.updateSlidesToShow();
    window.addEventListener("resize", this.updateSlidesToShow);
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.updateSlidesToShow);
  },
};
</script>

<style scoped>
.slide_div {
  padding: 5% 7%;
  background-color: #123931;
  color: white;
  text-align: center;
  border-bottom: 10px solid #09493c;
  display: flex;
  justify-content: space-between;
}
.slide_div_con_a h2 {
  font-size: 50px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 20px 0;
}
.slide_div_con_a h3 {
  font-size: 50px;
  font-weight: 500;
  font-family: dm-sans;
  line-height: 50px;
  margin: 20px 0;
}
.slide_div_con_a p {
  font-size: 20px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 20px 0;
  padding: 5px 15px;
  border: 2px solid white;
}
.slide_con_b {
  font-size: 150px;
  font-weight: 500;
  color: white;
  padding: 9% 0;
}

/* Slider Styles */
.slider-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding: 20px;
}

.slider {
  display: flex;
  transition: transform 1s ease;
}

.slide {
  flex: 1 0 calc(100% / 3); /* Show 3 cards at a time by default */
  background-color: #123931;
  color: white;
  text-align: center;
  border-bottom: 10px solid #09493c;
  border-radius: 10px;
  padding: 10px;
  transition: opacity 1s ease, transform 1s ease;
  box-sizing: border-box;
  margin-right: 10px; /* Add some space between slides */
  opacity: 0;
  cursor: pointer;
  box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.9);
}

.slide.visible {
  opacity: 1;
}

.fin2_con {
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.fin2_con img {
  width: 100%;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.9);
  height: 200px;
  object-fit: cover; /* Ensure the image covers the area without distortion */
  margin-bottom: 15px;
}

.fin2_con h3 {
  font-size: 30px;
  font-weight: 500;
  font-family: dm-sans;
  text-align: left;
  color: white;
  margin: 10px 0;
}

.fin2_con p {
  letter-spacing: 1px;
  font-size: 20px;
  font-weight: 400;
  font-family: dm-sans;
  color: white;
  margin: 20px 0;
  opacity: 0.7;
}

/* Slider controls */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  border-radius: 50%;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  user-select: none;

  opacity: 0.5;
}

.next {
  right: 0px;
  z-index: 10;
}

.prev {
  left: 20px;
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Accordion Styles */
.faq_q {
  padding: 10px;
  background-color: #f5f2f0;
  margin: 10px 0;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.faq_q:hover {
  background-color: #eaeaea;
}

.faq_q h3 {
  font-size: 18px;
  font-weight: 500;
  font-family: dm-sans;
  line-height: 28px;
  margin: 0;
}

.faq_q .fa-icon {
  font-size: 20px;
  transition: transform 0.3s ease;
}

.faq_an {
  padding: 10px;
  background-color: #ffffff;
  border: 1px solid #f5f2f0;
  border-radius: 5px;
  margin-top: 5px;
  transition: max-height 0.5s ease;
}

.faq_an p {
  font-size: 16px;
  font-weight: 500;
  font-family: dm-sans;
  line-height: 28px;
  margin: 0;
}

.faq_an ul li {
  font-size: 16px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 10px 0;
  list-style: square;
  margin-left: 20px;
}

/* Section Styles */
.section6,
.section3,
.section4 {
  margin-bottom: 20px; /* Add margin between sections */
}

.fin1 {
  display: flex;
  gap: 7%;
}

.fin1_a {
  width: 50%;
  text-align: center;
}

.fin1_a_con {
  padding: 15px 40px;
  background-color: #f1f1f1;
}

.fin1_a_con h2 {
  font-size: 30px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 10px 0;
}

.fin1_a_con p {
  font-size: 20px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 10px 0;
  padding: 5px 15px;
  opacity: 0.5;
}

.fin1_b {
  width: 50%;
  background-color: #f1f1f1;
  padding: 5% 5%;
  text-align: center;
}

.fin1_b h1 {
  font-size: 40px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 10px 0 20px 0;
}

.fin1_b h2 {
  font-size: 30px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 20px 0 40px 0;
  opacity: 0.5;
}

.fin1_b img {
  border-radius: 50%;
}

.fin3 {
  display: flex;
}

.fin3_a {
  width: 50%;
  padding: 1% 0;
}

.fin3_b {
  width: 50%;
}

.fin3_a p {
  display: inline;
  font-size: 20px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 20px 0 20px 20px;
  background-color: #f1f1f1;
  padding: 5px 15px;
}

.fin3_a h2 {
  font-size: 50px;
  font-weight: 500;
  line-height: 47px;
  font-family: dm-sans;
  margin: 10% 0 20% 0;
  padding-left: 20px;
}

.fin3_a h3 {
  font-size: 20px;
  font-weight: 500;
  font-family: dm-sans;
  margin: 40px 0 20px 0;
  padding-left: 20px;
}

/* Fade Transition */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}
.popup_field {
  display: flex;
  justify-content: space-between;
}
.value_pop {
  font-size: 16px;
  font-weight: 500;
  font-family: dm-sans;
  padding: 10px;
  margin-top: -10px;
  background-color: #f1f1f1;
}
.popup {
  position: relative;
  padding: 20px;
  background: #ffffff;
  border-radius: 15px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
  max-width: 600px;
  margin: 20px auto;
  overflow-y: auto;
  transition: transform 0.3s ease, opacity 0.3s ease;
  transform: translateY(0);
  opacity: 1;
  height: 80vh;
}

.popup h1 {
  font-size: 26px;
  font-weight: 600;
  font-family: "DM Sans", sans-serif;
  color: #052e26;
  margin-bottom: 25px;
  text-align: center;
}

.popup p,
.popup label {
  font-size: 16px;
  font-weight: 500;
  font-family: "DM Sans", sans-serif;
  color: #333333;
  margin-bottom: 12px;
}

.popup input[type="range"] {
  width: 100%;
  margin: 12px 0;
}

.popup input {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: 1px solid #cccccc;
  background-color: #f7f7f7;
  transition: background-color 0.3s ease;
}

.popup input:focus {
  background-color: #e8f0fe;
  border-color: #80bdff;
  outline: none;
}

.close_btn {
  position: absolute;
  top: 15px;
  right: 15px;
  font-size: 20px;
  cursor: pointer;
  color: darkgray;
  transition: color 0.3s ease;
}

.close_btn:hover {
  color: #000000;
}

.pop_check label {
  display: block;
  font-size: 18px;
  font-weight: 500;
  font-family: "DM Sans", sans-serif;
  color: #052e26;
  margin-bottom: 15px;
}

.pop_check input[type="checkbox"] {
  margin-left: 10px;
}

.input_btn {
  background-color: #052e26;
  color: #ffffff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  font-weight: 600;
  font-family: "DM Sans", sans-serif;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.3s ease;
  margin-top: 20px;
  display: block;
  width: 100%;
  text-align: center;
}

.input_btn:hover {
  background-color: #065445;
  transform: translateY(-2px);
}

@media only screen and (max-width: 768px) {
  .popup {
    padding: 15px;
    max-width: 100%;
    height: 70vh;
  }
  .fin1_a {
    margin-bottom: 20px;
  }
  .fin3_a h2 {
    font-size: 35px;
    padding: 20px 20px 0 20px;
  }
  .section6 {
    padding: 3%;
  }
  .slide_con_b {
    font-size: 550px;
  }
  .slide_div_con_a h2 {
    font-size: 18px;
  }
  .slide_div_con_a h3 {
    font-size: 28px;
  }
  .slide_div_con_a p {
    font-size: 18px;
  }
  .head_line {
    font-size: 30px;
  }
  .popup h1 {
    font-size: 20px;
    margin-bottom: 20px;
  }

  .popup p,
  .popup label {
    font-size: 15px;
  }

  .popup input {
    padding: 10px;
  }

  .close_btn {
    font-size: 18px;
  }

  .pop_check label {
    font-size: 16px;
  }

  .input_btn {
    padding: 10px 15px;
    font-size: 15px;
  }
}

@media only screen and (max-width: 1350px) {
  .fin1 {
    gap: 1%;
  }
  .fin1_a {
    margin-bottom: 20px;
  }
  .slide_con_b {
    font-size: 130px;
    font-weight: 500;
  }
  .slide_div_con_a h2 {
    font-size: 40px;
    font-weight: 400;
  }
  .fin1_b h1 {
    font-size: 30px;
    font-weight: 400;
  }
}

@media only screen and (max-width: 990px) {
  .fin1 {
    display: flex;
    flex-direction: column;
  }
  .fin1_a {
    width: 100%;
    margin-bottom: 20px;
  }
  .fin1_b {
    width: 100%;
  }
  .slide_div {
    padding: 5% 7%;
  }
  .fin3 {
    display: flex;
    flex-direction: column;
  }
  .fin3_a {
    width: 100%;
  }
  .fin3_b {
    width: 100%;
  }
  .fin3_a h2 {
    margin: 0;
  }
  .slide {
    flex: 1 0 100%; /* Show 1 card at a time on mobile screens */
  }
}

@media only screen and (max-width: 1024px) and (min-width: 768px) {
  .slide {
    flex: 1 0 calc(100% / 2); /* Show 2 cards at a time on iPad screens */
  }
}
</style>
