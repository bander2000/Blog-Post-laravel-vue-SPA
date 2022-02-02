<template>
<div>


       
<!-- ***** Preloader Start ***** -->
    <div id="preloader"  v-if="isLoading">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->



      <!-- Banner Starts Here -->
    <div class="main-banner header-text" >
      <div class="container-fluid">
        <div class="owl-banner owl-carousel" v-if="carosualBlogs">

          <div class="item" v-for="blog in carosualBlogs" :key="blog.id" >
            <img :src="blog.image" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>{{ blog.catogry.name }}</span>
                </div>
                <router-link :to="{ name: 'blog', params : { id : blog.id } }"><h4>{{ blog.title }}</h4></router-link>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">{{  format_date( blog.created_at)  }}</a></li>
                  <li><a href="#">{{ blog.comment_count }} Comments</a></li>
                </ul>
              </div>
          </div>
          </div>
         
          <!-- <div class="item">
            <img src="assets/images/banner-item-02.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>
                <a href="post-details.html"><h4>Donec porttitor augue at velit</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 14, 2020</a></li>
                  <li><a href="#">24 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-03.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>
                <a href="post-details.html"><h4>Best HTML Templates on TemplateMo</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 16, 2020</a></li>
                  <li><a href="#">36 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-04.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Fashion</span>
                </div>
                <a href="post-details.html"><h4>Responsive and Mobile Ready Layouts</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 18, 2020</a></li>
                  <li><a href="#">48 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-05.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>
                <a href="post-details.html"><h4>Cras congue sed augue id ullamcorper</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 24, 2020</a></li>
                  <li><a href="#">64 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/banner-item-06.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>
                <a href="post-details.html"><h4>Suspendisse nec aliquet ligula</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 26, 2020</a></li>
                  <li><a href="#">72 Comments</a></li>
                </ul>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

  


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12" v-for="blog in listBlogs" :key="blog.id">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img :src="blog.image" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{ blog.catogry.name }}</span>
                <router-link :to="{ name: 'blog', params: { id : blog.id }  }"><h4>{{ blog.title }}</h4></router-link>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">{{ format_date( blog.created_at) }}</a></li>
                        <li><a href="#">{{ blog.comment_count }} Comments</a></li>
                      </ul>
                      <p>{{ blog.content.substring(0,500)+"....." }} </p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Beauty</a>,</li>
                              <li><a href="#">Nature</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <div class="col-lg-12">
                  <div class="main-button">
                    <router-link :to="{ name: 'AllBlogs' }" >View All Posts</router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
       <latest-blogs :latest-blogs="latestBlogs" :catogries="catogries"></latest-blogs>
        </div>
      </div>
    </section>


    </div>
</template>

<script>
  import moment from 'moment';
  import LatestBlogs from '../components/LatestBlogs.vue';


export default {

   components : {
     LatestBlogs
 } ,

   data() {
     return {
       isLoading:false,
       carosualBlogs:null,
       listBlogs:null,
       latestBlogs:null,
       catogries:null
     }
   } ,
    created () {
       this.isLoading=true
      axios.get('/api/blogs').then((result) => {
        this.carosualBlogs = result.data.data.carosualBlogs
        this.listBlogs = result.data.data.listBlogs
        this.latestBlogs = result.data.data.latestBlogs
        this.catogries=result.data.data.catogries
        this.isLoading=false

      }).catch((err) => {
        
      });
    },
     methods: { 
      format_date(value){
         if (value) {
           return moment(String(value)).format('YYYY/MM/DD')
          }
      },
   }
}
</script>
