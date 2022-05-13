<template>
    <div>
        <div>
            <span style="font-size: 20px">
                Select the <span style="font-weight: bold">3</span> most
                important intersections to you:</span
            >
            <div>
                <div>
                    <div
                        v-for="intersection in intersections"
                        :key="intersection.viewLabel"
                        class="form-check"
                    >
                        <input
                            class="form-check-input"
                            type="checkbox"
                            @change="checkboxChanged(intersection, $event)"
                            id="defaultCheck1"
                        />
                        <label class="form-check-label" for="defaultCheck1">
                            {{ intersection.viewLabel }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="maxSelected && selectedIntersections.length >= 3">
            <div class="container">
                <form id="intersectionDebrief">
                    <div
                        v-for="intersection in selectedIntersections"
                        :key="intersection"
                    >
                        <div class="row">
                            <div class="col">
                                <div class="card-deck">
                                    <div
                                        class="card text-center"
                                        style="width: 100%; margin-bottom: 2%"
                                    >
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Please describe the overall
                                                nature of the
                                                {{ intersection }}
                                                intersection in terms of
                                                emotions, behaviors, and time
                                                invested
                                            </h5>
                                            <div
                                                v-for="harmonyQuestion in questions"
                                                :key="harmonyQuestion"
                                            >
                                                <div
                                                    style="
                                                        padding: 50px;
                                                        margin-top: 10px;
                                                        margin-bottom: 10px;
                                                    "
                                                >
                                                    <p
                                                        style="
                                                            width: 35ch;
                                                            float: left;
                                                            text-align: left;
                                                        "
                                                    >
                                                        {{
                                                            harmonyQuestion.extreme_left
                                                        }}
                                                    </p>
                                                    <div
                                                        v-for="index in parseInt(
                                                            harmonyQuestion.degrees
                                                        )"
                                                        :key="index"
                                                        class="form-check form-check-inline w-2 mt-4"
                                                    >
                                                        <input
                                                            type="radio"
                                                            class="survey-radio"
                                                            :name="
                                                                'question' -
                                                                harmonyQuestion.id
                                                            "
                                                            :id="
                                                                harmonyQuestion.id
                                                            "
                                                            :value="index"
                                                            :change="
                                                                saveAnswer(
                                                                    harmonyQuestion.id,
                                                                    index
                                                                )
                                                            "
                                                        />
                                                    </div>
                                                    <p
                                                        style="
                                                            width: 35ch;
                                                            float: right;
                                                            text-align: right;
                                                        "
                                                    >
                                                        {{
                                                            harmonyQuestion.extreme_right
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "intersectiondebriefselector",
    props: ["intersections", "questions"],
    mounted() {
        console.log(this.intersections);
        console.log(this.selectedIntersections);
        console.log(this.questions);
    },
    data() {
        return {
            selectedIntersections: [],
            maxSelected: false,
        };
    },

    methods: {
        checkboxChanged(intersection, event) {
            console.log(intersection.viewLabel);
            if (event.target.checked == true) {
                this.selectedIntersections.push(intersection.viewLabel);
            } else {
                this.selectedIntersections.splice(
                    this.selectedIntersections.indexOf(intersection.viewLabel),
                    1
                );
            }
            if (this.selectedIntersections.length == 3) {
                // disable the rest of the options
                this.maxSelected = true;
            } else {
                this.maxSelected = false;
            }
            // console.log(intersection);
            // console.log(event.target.checked);
            console.log(JSON.parse(JSON.stringify(this.selectedIntersections)));
        },

        saveAnswer(harmonyId, answer) {
            axios
                .post("/saveSurveyAnswer", {
                    surveyable_id: harmonyId,
                    question_id: harmonyId,
                    surveyable_type: "question",
                    answer: answer,
                })
                .then(function (result) {
                    console.log(result);
                });
        },
    },
};
</script>
