<?php
namespace BarclayCard\Controllers;

class Review {
    private $reviewList;

    public function __construct($reviewList){
        $this->reviewList=$reviewList;
    }


    public function reviewForm() {
        //generate the review form
        return [
            'template' => 'review.html.php',
            'title' => 'Painting by numbers - Review',
            'variables' => [

            ],
         ];
    }

    public function reviewSubmit(){
        //submit the review
        $review = $_POST['review'];
        $this->reviewList->save($review);

        $selectReview=$this->reviewList->findAll();

        $reviewID = $selectReview[(count($selectReview)-1)];

        return [
            'template' => 'reviewsuccess.html.php',
            'title' => 'Painting by numbers - Contact',
            'variables' => [
                'review' => $reviewID
            ]
        ];
    }

    public function listunapproved(){
        //list unapproved reviews in the admin area
        $reviews = $this->reviewList->findAll();

        return ['template' => 'adminreviews.html.php',
                'title' => 'Shopping - Admin',
                'variables' => [
                    'reviews' => $reviews
                ]
            ];
    }

    public function listapproved(){
        //list of approved reviews
        $reviews = $this->reviewList->findAll();

        return ['template' => 'adminapproved.html.php',
                'title' => 'Painting by numbers - Admin',
                'variables' => [
                    'reviews' => $reviews
                ]
            ];
    }

    public function delete(){
        //delete a review
        $this->reviewList->delete($_POST['id']);
        $reviews = $this->reviewList->findAll();
        return ['template' => 'adminreviews.html.php',
                'title' => 'Painting by numbers - Admin',
                'variables' => [
                    'reviews' => $reviews
                ]
            ];
    }

    public function approve(){
        $review['approved'] = 1;
        $this->reviewList->save($review);
        return ['template' => 'approvesuccess.html.php',
                'title' => 'Shopping - Admin',
                'variables' => [
                    'reviews' => $reviews
                ]
            ];
    }

    public function unapprove(){
      $review['approved'] = 0;
      $this->reviewList->save($review);
      return ['template' => 'unapprovesuccess.html.php',
              'title' => 'Shopping - Admin',
              'variables' => [
                  'reviews' => $reviews
              ]
          ];
    }

    public function deleteapproved(){
        //delete an approved review
        $this->reviewList->delete($_POST['id']);
        $reviews = $this->reviewList->findAll();
        return ['template' => 'adminapproved.html.php',
                'title' => 'Painting by numbers - Admin',
                'variables' => [
                    'reviews' => $reviews
                ]
            ];
    }
}
