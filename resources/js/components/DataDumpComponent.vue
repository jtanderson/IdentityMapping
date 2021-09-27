<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body text-center">
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="flexCheckDefault"
                    />
                    <label class="form-check-label" for="flexCheckDefault">
                        Get All User Data
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="flexCheckChecked"
                    />
                    <label class="form-check-label" for="flexCheckChecked">
                        Get Data by Gender
                    </label>
                </div>
                <div class="form-check form-check-inline mb-4">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="flexCheckChecked"
                    />
                    <label class="form-check-label" for="flexCheckChecked">
                        Get Data by Age
                    </label>
                </div>
            </div>
            <div class="text-center mb-4">
                <button
                    type="button"
                    class="btn btn-success"
                    style="width: 85px;"
                    v-on:click="getData"
                >
                    Get Data
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {},

    data() {
        return {};
    },

    name: "DataDump",

    methods: {
        async getData() {
            // Some sort of state we want when the user enters data or selects what type of data to get
            let s = 0;
            await axios.get("/admin/getData/").then(response => {
                console.log(response);
            });
        }
    }
};
</script>
