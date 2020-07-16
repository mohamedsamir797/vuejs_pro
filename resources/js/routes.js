import VueRoute from 'vue-router'

import Vue from 'vue';

import test from './components/test'
import create from './components/post/create'
import index from './components/post/index'
import edit from './components/post/edit'

Vue.use(VueRoute);

const routes = [
    { path : '/test' ,component : test },
    { path : '/post/create' ,component : create },
    { path : '/' ,component : index },
    { path : '/post/edit/:id' ,component : edit },
];


const router = new VueRoute({
    routes ,
    mode : 'history'
});

export default router