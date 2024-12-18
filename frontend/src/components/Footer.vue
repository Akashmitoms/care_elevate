<template>
  <footer>
    <div class="footer">
      <div class="footer_a">
        <h2>BUDZEECO</h2>
        <p>
          Budzeeco is designed to be your ultimate partner in managing personal
          finances and investment. We offer an all- encompassing range of
          sevices that carter to every aspect of your financial journey,
          ensuring that you have the tools and support needed to make informed
          decisions and achieve your financial goals.
        </p>
      </div>
      <div class="footer_b">
        <ul>
          <li @click="$router.push('/financial-clinic')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span
            >Financial Clinic
          </li>
          <li @click="$router.push('/calculators')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span>
            Calculators
          </li>
          <li @click="$router.push('/#')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span> My
            Journey
          </li>
          <li @click="$router.push('/#')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span> My
            Club
          </li>
          <li @click="$router.push('/contact')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span>
            Contact
          </li>
        </ul>
      </div>
      <!-- <div class="footer_b">
        <ul>
          <li @click="$router.push('/privacy')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span
            >Privacy Policy
          </li>
          <li @click="$router.push('/terms-condition')">
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span>
            Terms and Conditions
          </li>
          <li>
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span>
            Cancellation and Refund Policy
          </li>
          <li>
            <span><font-awesome-icon :icon="['fas', 'angle-right']" /></span>
            Shipping and Delivery Policy
          </li>
        </ul>
      </div> -->
      <div class="footer_a">
        <h3>Follow Us On</h3>
        <div class="icon">
          <a href="https://www.facebook.com/profile.php?id=61564207684276">
            <span><font-awesome-icon :icon="['fab', 'facebook-f']" /></span
          ></a>
          <a href="https://www.linkedin.com/company/budzeeco/"
            ><span><font-awesome-icon :icon="['fab', 'linkedin']" /></span
          ></a>
          <a href="https://www.instagram.com/mybudzeeco/"
            ><span><font-awesome-icon :icon="['fab', 'instagram']" /></span
          ></a>
        </div>
      </div>
    </div>
    <hr class="hr"/>
    <div class="foorter_bottm">
      <span @click="$router.push('/terms-condition')">
        Terms and Conditions
      </span>
      <span @click="$router.push('/privacy')"> Privacy Policy </span>
    </div>
  </footer>
</template>

<style scoped>
footer {
  background-color: #052e26;
  padding: 25px 0 10px 0;
}
.footer {
  display: flex;
  background-color: #052e26;
  margin: 0 9%;
}
.footer_a,
.footer_b {
  width: 33.33%;
  color: white;
  padding: 0 20px;
}

.footer_a h2 {
  font-family: dm-sans;
  font-size: 20px;
  font-weight: 500;
  padding: 10px 0;
  text-align: center;
}
.footer_a h3 {
  font-family: dm-sans;
  font-size: 20px;
  font-weight: 500;
  padding: 10px 0;
  text-align: center;
}
.footer_a p {
  font-family: dm-sans;
  font-size: 16px;
  font-weight: 500;
  text-align: justify;
}
.footer_b ul {
  list-style: none;
}
.footer_b ul li {
  font-family: dm-sans;
  font-size: 16px;
  font-weight: 500;
  padding: 5px 0;
  cursor: pointer;
  margin-left: 50%;
}
.footer_b ul li:hover {
  background-color: #123931;
  font-weight: bold;
  text-decoration: underline;
}
.footer_b ul li span {
  padding-right: 10px;
}
.footer_a {
  text-align: center;
}
.icon {
  display: flex;
  margin: auto;
  justify-content: center;
}
.icon span {
  padding: 10px 15px;
  color: white;
  background-color: #123931;
  margin: 5px;
}
.icon span:hover {
  background-color: white;
  color: #052e26;
}
.foorter_bottm {
  width: 90%;
  display: flex;
  justify-content: right;
  padding: 15px 0;
  gap: 20px;
}
.foorter_bottm span{
  color: white;
  font-family: dm-sans;
  cursor: pointer;
}
.foorter_bottm span:hover{
  text-decoration: underline;
}
.hr {
  border: 1px solid lihtgray;
  width: 90%;
  margin: 10px auto;
}
@media only screen and (max-width: 990px) {
  .footer {
    display: flex;
    flex-direction: column;
  }
  .footer_a {
    width: 100%;
  }
  .footer_b {
    width: 100%;
  }
  .footer_a h3 {
    text-align: left;
  }
  .icon {
    justify-content: flex-start;
  }
  .footer_b ul li {
    margin-left: 0;
   
  }
  .footer_b ul{
    margin-top: 20px;
    margin-bottom: 20px;
  }
}
</style>
