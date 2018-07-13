export default {
    colleges(context, data) {
        console.log(data);
        context.commit('colleges', data);
    }
}