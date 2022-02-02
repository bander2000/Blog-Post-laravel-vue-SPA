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

    
    <div class="content" >
        <div class="container">
        <div class="row" >
          <div class="col-md-12"  style="margin-top:200px">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Your Posts</h4>
                <router-link class="btn btn-success my-2"  :to="{ name: 'postblog'} " >
                  <i class="fas fa-plus"></i>
                </router-link>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>
                        Title
                      </th>
                      <th>
                        comment count
                      </th>
                      <th >
                       Edit
                      </th>
                       <th >
                       Delete
                      </th>
                      <th >
                       show
                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="blog in  blogs" :key="blog.id">
                        <td>
                          {{ blog.title }}
                        </td>
                        <td>
                          {{ blog.comment_count }}
                        </td>
                        <td>
                          <router-link  :to="{ name: 'editblog' , params: { id : blog.id }   }" style="color:green">
                         <i class="fas fa-pencil-alt"></i>
                         </router-link>
                        </td>
                        <td>
                         <i class="fas fa-trash"  @click="deleteBlog(blog.id)" style="color:red"></i>
                        </td>
                        <td style="color:blue">
                       <router-link  :to="{ name: 'blog', params: { id : blog.id }  }" style="color:green">

                            <i class="fas fa-eye" ></i>

                       </router-link>
                        </td>
                      </tr>
                    </tbody>
                    <div class="alert alert-green" v-if="success">
                      {{ success }}
                    </div>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>

      </div>
</template>

<script>

export default {
  data() {
    return {
      isLoading:false,
      blogs:null,
      success:null
    }
  },
   created () 
   {
       this.isLoading = true
       axios.get(`/api/dashboard`).then((result) => {
         this.blogs = result.data
          this.isLoading = false
       }).catch((err) => {
           
       });
   },
   methods : {
    
     deleteBlog(id) 
     {
        if(confirm("Do you really want to delete?")){
        axios.delete(`/api/blog/${id}`).then((result) => {
          console.log(result)
         this.success = result.data
       }).catch((err) => {
           
       });
     }
     }
     
   }
}
</script>
