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

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Post Details</h4>
                <h2>Single blog post</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    


    <section class="blog-posts grid-system" v-if="! isLoading">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img :src="blog.image" alt="">
                    </div>
                    <div class="down-content">
                      <span>Lifestyle</span>
                      <router-link :to="{ name: 'blog', params : { id : blog.id } }"><h4>{{ blog.title }}</h4></router-link>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">{{ format_date( blog.created_at) }}</a></li>
                        <li><a href="#">{{ blog.comment_count }} Comments</a></li>
                      </ul>
                      <p>{{ blog.content }}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
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
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>{{ blog.comment_count }} comments</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li v-for="comment in blog.comment" :key="comment.id">
                          <div class="right-content">
                            <h4>{{ comment.subject }}<span>{{ format_date(comment.created_at) }}</span></h4>
                            <p>{{ comment.content }}</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    <div class="content">
                      <form id="comment" @submit.prevent="formSumbit">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input v-model="name" v-if="!isAuth" name="name" type="text" id="name" placeholder="Your name" required="" >
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input v-model="email" v-if="!isAuth" name="email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input v-model="subject" name="subject" type="text" id="subject" placeholder="Subject">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea v-model="content" name="content" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
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
      blog:null,
      latestBlogs:null,
      catogries:null,
      isLoading:false,
      name:null,
      email:null,
      subject:null,
      content:null,
      isAuth:false
    }
  } ,

  beforeCreate() {
    this.cheackisAuth
  } ,

created() {
  this.isLoading = true
  this.fetchBlog()
},
     methods: { 
      format_date(value){
         if (value) {
           return moment(String(value)).format('YYYY/MM/DD')
          }
      },

      fetchBlog() {
         axios.get(`/api/blog/${this.$route.params.id}`).then((result) => {
    this.blog = result.data.data.blog
    this.latestBlogs=result.data.data.latestBlogs
    this.catogries=result.data.data.catogries
    this.isLoading = false
  }).catch((err) => {
    
  });
      },

      formSumbit() {
        axios.post(`/api/blog/${this.$route.params.id}/comment`,{
          name:this.name,
          email:this.email,
          subject:this.subject,
          content:this.content,
        }).then((response) => {  
          this.fetchBlog()
        })  
          .catch((error) => {  
           });  
      },
      cheackisAuth() {
        axios.get(`api/athenticated`).then((result) => {
      if(result)
      this.isAuth = true
    }).catch((err) => {
      
    });
    }
   }

}
</script>
