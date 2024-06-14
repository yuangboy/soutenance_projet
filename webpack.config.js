module.exports = {
    // other webpack configurations
    resolve: {
        // Configure webpack to resolve modules
        modules: ['node_modules', path.resolve(__dirname, 'src')],
    },
};
