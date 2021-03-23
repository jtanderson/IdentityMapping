<template>
    <tr>
        <td>{{ question.text }}</td>
        <td>{{ question.degrees }}</td>
        <td>{{ question.extreme_left }}</td>
        <td>{{ question.extreme_right }}</td>
        <td>{{ question.surveyable_type }}</td>
        <td>
            <div class="btn-group" role="group">
                <button
                    class="btn btn-primary mr-1 rounded"
                    @click="$emit('edit', question)"
                >
                    Edit
                </button>
                <button
                    class="btn btn-danger rounded"
                    @click="$emit('delete', question.id)"
                >
                    Remove
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: ["question"]
};
</script>
