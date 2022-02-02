<template>
  <div>



      <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Stand Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'home' }">Home
                </router-link>
              </li> 
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'about' }">About Us</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'contact' }">Contact Us</router-link>
              </li>
               <li class="nav-item" v-if="!isAuth">
                <router-link class="nav-link" :to="{ name: 'login' }">Log in</router-link>
              </li>
               <li class="nav-item" v-if="!isAuth">
                <router-link class="nav-link" :to="{ name: 'register' }">Sign up</router-link>
              </li>
               <li class="nav-item" v-if="isAuth">
                <a class="nav-link" @click.prevent="logout" style="cursor: pointer;">Log out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    

    <router-view></router-view>



        <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Behance</a></li>
              <li><a href="#">Linkedin</a></li>
              <li><a href="#">Dribbble</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>Copyright 2020 Stand Blog Co.
                    
                 | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


  </div>
</template>

<script>
export default {
  data(){
    return {
      isAuth:false
    }
  },
  beforeCreated() {
    this.cheackisAuth
  }
  ,
  methods : {
    cheackisAuth() {
        axios.get(`api/athenticated`).then((result) => {
      if(result)
      this.isAuth = true
    }).catch((err) => {
      
    });
    },
    logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: "home"})
            })
        }
    
  }
}
</script>