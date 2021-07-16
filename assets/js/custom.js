/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

function gen_rand_kode(){
   return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
}
