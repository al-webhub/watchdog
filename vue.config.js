module.exports = {
  devServer: {
    disableHostCheck: true,
    proxy: "http://localhost:8000"
  },
  publicPath: process.env.NODE_ENV === 'production'
    ? '/landingly/'
    : '/'
};
