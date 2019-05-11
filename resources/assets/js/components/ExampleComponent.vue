<template>
    <div>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Notificações <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" v-for="notification in notifications" :key="notification">
                    {{notification}}
                </a>

                <a class="dropdown-item" href="#">
                    Limpar Notificações
                </a>
            </div>
        </li>
    </div>
</template>

<script>
export default{
  created(){
   this.loadNotifications()
},
  computed:{
  notifications(){
    return this.notificationsItems
      }
    },
data(){
  return{
    notificationsItems:[]
      }
    },
methods: {
  loadNotifications(){
axios.get('/notifications')
.then(response=>{
  console.log(response)
})

    }
}

}
</script>
