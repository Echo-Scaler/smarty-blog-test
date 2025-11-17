<?php
namespace App;

class Blog {
    private $smarty;
    
    public function __construct($smarty) {
        $this->smarty = $smarty;
    }
    
    public function getPosts() {
        return [
            [
                'id' => 1,
                'title' => 'Smarty Template Engine သင်ခန်းစာ',
                'author' => 'မောင်မောင်',
                'excerpt' => 'Smarty သည် PHP အတွက် powerful template engine ဖြစ်သည်။',
                'content' => 'Smarty သည် PHP logic နှင့် HTML presentation ကို ခွဲခြားနိုင်သည်။ 
                              ဒီ code လေးက Smarty template ထဲမှာ variable တစ်ခု ($post.content) ကို output လုပ်ပြီး
                              PHP nl2br() function လိုပဲ new line ကို <br> tag ပြောင်းပေးတဲ့ modifier ဖြစ်ပါတယ်။',
                'created_at' => date('Y-m-d'),
                'tags' => ['PHP', 'Smarty', 'Tutorial']
            ],
            [
                'id' => 2,
                'title' => 'Web Development Tips',
                'author' => 'အေးအေး',
                'excerpt' => 'Web development အကြောင်း အသုံးဝင်သော tips များ',
                'content' => 'Security, performance နှင့် UX တို့ကို အထူးဂရုစိုက်ပါ။',
                'created_at' => date('Y-m-d'),
                'tags' => ['Web', 'Development']
            ],
            [
                'id' => 3,
                'title' => 'Php Development Tips',
                'author' => 'မောင်အေး',
                'excerpt' => 'Web development အကြောင်း အသုံးဝင်သော tips များ',
                'content' => 'Security, performance နှင့် UX တို့ကို အထူးဂရုစိုက်ပါ။',
                'created_at' => date('Y-m-d'),
                'tags' => ['Web', 'Development']
            ]
        ];
    }
    
    public function getPostById($id) {
        $posts = $this->getPosts();
        foreach ($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        return null;
    }
}