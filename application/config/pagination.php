<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['query_string_segment'] = 'start';

$config['full_tag_open'] = '<nav aria-label="Page Navigation"><ul class="pagination">';
$config['full_tag_close'] = '</ul></nav>';

$config['first_link'] = 'Pertama';
$config['first_open_tag'] = '<li class="page-item">';
$config['first_close_tag'] = '</li>';

$config['last_link'] = 'Terakhir';
$config['last_open_tag'] = '<li class="page-item">';
$config['last_close_tag'] = '</li>';

$config['next_link'] = 'Selanjutnya';
$config['next_open_tag'] = '<li class="page-item">';
$config['next_close_tag'] = '</li>';

$config['prev_link'] = 'Sebelumnya';
$config['prev_open_tag'] = '<li class="page-item">';
$config['prev_close_tag'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</a></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['attributes'] = ['class' => 'page-link'];
