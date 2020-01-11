postLikeTip: function( tipID ){
    return axios.post( ROAST_CONFIG.API_URL + '/tip/' + tipID + '/like' );
  };

  deleteLikeTip: function( tipID ){
    return axios.delete( ROAST_CONFIG.API_URL + '/tip/' + tipID + '/like' );
  }