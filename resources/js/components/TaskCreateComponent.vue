<template>
     <div class="container">
         <!-- <div class="row justify-content-center">
             <div class="col-sm-6">
      説明
                 各フォームはv-modelでtaskデータとバインディングすることで、フォームにデータが入力されたら<scripts>側のtaskデータも更新。そして、<form v-on:submit.prevent="submit">で、フォーム送信時に先ほど定義したsubmitメソッドを呼び出す。これで、入力内容が反映されたtaskデータをsubmitメソッドでAPI送信できる状態に。    
                 -->
                 <!-- <form v-on:submit.prevent="submit">
                     <div class="form-group row">
                         <label for="title" class="col-sm-3 col-form-label">Title</label>
                         <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                     </div>
                     <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                     </div>
                     <div class="form-group row">
                         <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                         <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
             </div>
         </div> --> 
     </div>
 </template>

 <script>
   export default {
       /**　説明
        * 空のtaskデータを用意するところは先ほどと同じ。methods の submit() メソッドで、taskデータをタスク登録APIにPOST送信する処理を書く。また、APIによるデータ登録完了後、this.$router.push({name: 'task.list'}); でタスク一覧ページにリダイレクト。
        */
       data: function () {
           return {
               task: {}
           }
       },
       methods: {
           submit() {
               axios.post('/api/tasks', this.task)
                   .then((res) => {
                       this.$router.push({name: 'task.list'});
                   });
           }
       }
   }

 </script>