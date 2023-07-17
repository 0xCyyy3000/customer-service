<template>
    <router-view></router-view>
    <section class="d-flex flex-wrap mb-4">
        <template v-for="(item, index) in items" :key="index">
            <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="max-width: 310px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img :src="this.profile_path + 'cyril.jpeg'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ item }}</h5>
                            <p class="card-text">
                                <small class="text-body-secondary" v-if="index == 0">Repaired items</small>
                                <small class="text-body-secondary" v-else-if="index == 1">Blah blah</small>
                                <small class="text-body-secondary" v-else>Hayyyy</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </section>

    <section class="mb-3">
        <h4 class="mb-3">Top repaired items</h4>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Classification</th>
                        <th scope="col">No. of repairs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Laptop</td>
                        <td>37x</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>PC</td>
                        <td>19x</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Monitor</td>
                        <td>8x</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="mb-3">
        <h4 class="mb-3">Recent orders</h4>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            profile_path: 'assets/images/user-profile/',
            items: [82, 24, 38]
        }
    },
    mounted() {
        console.log('dashboard mounted!');
    },
}
</script>