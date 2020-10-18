module.exports = {
  devServer: {
    disableHostCheck: true,
    proxy: "http://127.0.0.1:8000"
  },
  publicPath: process.env.NODE_ENV === 'production'
    ? '/'
    : '/'
};
