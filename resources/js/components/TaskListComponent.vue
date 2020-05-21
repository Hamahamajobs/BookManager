<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book</th>
                <th scope="col">Content</th>
                <th scope="col">Holder</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>

            <tbody>
                <!--hamada todo ↓<tr v-for="task in tasks">なぜか警告あり-->
                <!--定義したtasksデータをv-forで取り出す。-->
                <tr v-for　="task in tasks">
                    <th scope="row">{{ task.id }}</th>
                    <td>{{ task.title }}</td>
                    <td>{{ task.content }}</td>
                    <td>{{ task.person_in_charge }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id }}">
                            <button class="btn btn-primary">Show</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                            <button class="btn btn-success">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
/**
 * まず data には空配列の tasks を用意。そして、 methods にある getTasks() メソッドで、タスク一覧取得APIにリクエストして,そのレスポンスを先ほどの tasks の中に入れる。（このメソッドで先ほど話したaxiosを利用してリクエスト）そして、画面描画時にこの getTasks() メソッドが実行されるように、mounted() でメソッドを呼び出し。
 */
    export default {
        data: function () {
            return {
                //初期状態では、配列は空っぽになっている。通信でGETした後にここに格納される。
                tasks: []
            }
        },
        methods: {
            getTasks() {
                //axiosというajax通信用のライブラリーがあるのでそれを使う。Vue.jsは通信機能は普通は用意していない。
                //URLはLaravelのルータ-に合わせてOK
                axios.get('/api/tasks')
                //.thenで通信が成功したあとの処理を記述している。
                //引数のresは通信の結果、得たもの
                    .then((res) => {
                        this.tasks = res.data;//res.dataで取得。引数に合わせてOK
                    });
            },
            deleteTask(id) {
                axios.delete('/api/tasks/' + id)
                .then((res) => {
                    /*削除完了したら、getTasks() メソッドを呼んでタスク一覧を再読み込み。 */
                    this.getTasks();
                });
            }
        },
        //mounted()がページを読み込んだ時に行う処理？※マウントとは、既存のDOM要素をVue.jsが生成するDOM要素で置き換えること。
        mounted() {
            this.getTasks();
        }
    }
</script>