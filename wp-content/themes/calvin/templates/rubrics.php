<?php $links = array_map(function ($category) {
                        return sprintf(
                          '<a href="%s">%s</a>', // Шаблон вывода ссылки
                          esc_url(get_category_link($category)), // Ссылка на рубрику
                          esc_html($category->name) // Название рубрики
                        );
                      }, get_the_category());

                      echo implode(' ', $links);
