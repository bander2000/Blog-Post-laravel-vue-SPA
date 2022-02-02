<template>
      <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li v-for="blog in latestBlogs" :key="blog.id">
        
           <router-link :to="{ name: 'blog', params: { id : blog.id }  }">
             <h5>{{ blog.title }}</h5>
              <span>{{ format_date( blog.created_at) }}</span>
           </router-link>

                      </li>
                        <!-- <li><a href="post-details.html">
                          <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                          <span>May 28, 2020</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                          <span>May 14, 2020</span>
                        </a></li> -->
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li v-for="catogry in catogries" :key="catogry.id">
                          <router-link :to="{ name: 'CatogryBlogs', params: { id : catogry.id }  }">- {{ catogry.name }}</router-link></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</template>


<script>
    import moment from 'moment';

export default {
    
    props:['latestBlogs','catogries'],
     methods: { 
      format_date(value){
         if (value) {
           return moment(String(value)).format('YYYY/MM/DD')
          }
      }
     }
     
}
</script>
