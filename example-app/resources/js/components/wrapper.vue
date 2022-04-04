<template>
  <div class="wrapper news" >
        <div class="news__header">
            <button class="news__btn" v-b-modal.modal-1>Новая новость</button>
            <button class="news__btn" @click="fetchPosts">Получит посты</button>
            <select 
                v-bind:value="selectedSort" 
                @change="changeOption"
            >
                <option disabled value="">Выберите из списка</option>
                <option 
                    v-for="option in sortOptions" 
                    :key="option.value" 
                    :value="option.value"
                >
                    {{option.name}}
                </option>
            </select>
        </div>

        <div
            v-for="post in posts" 
            :key="post.id" 
            class="news__item"
        >
            <div class="news__img">
                <img src="img/gallery1.png" alt="">
            </div>
            <div class="news__item-info">
                <div class="news__id"> {{ post.id }} </div>
                <div class="news__title">{{ post.title }}</div>
                <div class="news__text">{{ post.body }}</div>
            </div>
        </div>

        <b-modal id="modal-1" title="Добавить новость">
            <form @submit.prevent>
                <input 
                    v-bind:value="title"
                    @input="title = $event.target.value" 
                    type="text" 
                    placeholder="Заголовок"
                >
                <input 
                    v-bind:value="body" 
                    @input="body = $event.target.value" 
                    type="text" 
                    placeholder="Описание"
                >
            </form>
            <button 
                
                @click="createPost"
            >
                Добавить новость
                </button>
        </b-modal>
  </div>
</template>

<script>
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import  mySelect from './mySelect.vue'
import  myButton from './UI/muButtons.vue'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
import axios from 'axios';
export default {
    components:{
        mySelect, myButton
    },
    data () {
        return {
            posts: [],
            title: '',
            body: '',
            selectedSort: '',
            sortOptions:[
                {value: 'title', name: 'По названию'},
                {value: 'id', name: 'По дате'}
                ]
            }
        },
        methods:{
            createPost () {
                const newPost = {
                    id: Date.now(),
                    title: this.title,
                    body: this.body
                }
                this.posts.push(newPost)
            },
            async fetchPosts(){
                try{
                    const response = await axios.get('http://127.0.0.1:8000/api/myapi') 
                    this.posts = response.data.posts
                } catch(e){
                    alert('Ошибка')
                }
            },
            changeOption (event) {
                this.selectedSort = event.target.value
            }
        },
        watch: {
            selectedSort(newValue) {
                console.log(newValue);
                    this.posts.sort((post1, post2) => {
                    return post1[this.selectedSort]?.localeCompare(post2[this.selectedSort])
                })
            }
        }
    }
</script>

<style>

</style>