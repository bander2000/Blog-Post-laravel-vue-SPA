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
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    

    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-6" v-for="blog in laravelData.data" :key="blog.id">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img :src="blog.image" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{ blog.catogry.name }}</span>
                      <router-link :to="{ name: 'blog', params : { id : blog.id } }"><h4>{{ blog.title }}</h4></router-link>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">{{ format_date( blog.created_at) }}</a></li>
                        <li><a href="#">{{ blog.comment_count }} Comments</a></li>
                      </ul>
                      <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
              <pagination :data="laravelData" @pagination-change-page="getResults" align="center"></pagination>

                <!-- <div class="col-lg-12">
                  <ul class="page-numbers">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </div> -->
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
      catogries:null,
      latestBlogs:null,
      laravelData: {},
      isLoading:false
    }
  },

  mounted() {
  this.isLoading = true

		// Fetch initial results
		this.getResults();
	},
    
methods : {

  getResults(page = 1) {
			axios.get(`/api/catogry/${this.$route.params.id}/blogs?page=` + page)
				.then((response) => {
					this.laravelData = response.data.data.listBlogs;
          this.latestBlogs=response.data.data.latestBlogs
          this.catogries=response.data.data.catogries
          this.isLoading = false
				});
		},
      format_date(value){
         if (value) {
           return moment(String(value)).format('YYYY/MM/DD')
          }
      }
}
}
</script>
