<?php

namespace spec\App;

use App\Tennis;
use App\Player;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
class TennisSpec extends ObjectBehavior
{
    private $kamal;
    private $iyad;
    function let()
    {
        $this->kamal = new Player('kamal' , 0);
        $this->iyad = new Player('iyad' , 0);
        $this->beConstructedWith($this->kamal, $this->iyad);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    function it_should_score_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }
    function it_should_score_1_0_game()
    {
        $this->kamal->earnPoints(1);
        $this->iyad->earnPoints(0);
        $this->score()->shouldReturn('Fifteen-Love');
    }
    function it_should_score_1_1_game()
    {
        $this->kamal->earnPoints(1);
        $this->iyad->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-All');
    }
    function it_should_score_2_0_game()
    {
        $this->kamal->earnPoints(2);
        $this->iyad->earnPoints(0);
        $this->score()->shouldReturn('Thirty-Love');
    }
    function it_should_score_3_0_game()
    {
        $this->kamal->earnPoints(3);
        $this->iyad->earnPoints(0);
        $this->score()->shouldReturn('Forty-Love');
    }
    function it_should_score_4_0_game()
    {
        $this->kamal->earnPoints(4);
        $this->iyad->earnPoints(0);
        $this->score()->shouldReturn('Winner: kamal');
    }
    function it_should_score_0_4_game()
    {
        $this->kamal->earnPoints(0);
        $this->iyad->earnPoints(4);
        $this->score()->shouldReturn('Winner: iyad');
    }
    function it_should_score_4_3_game()
    {
        $this->kamal->earnPoints(4);
        $this->iyad->earnPoints(3);
        $this->score()->shouldReturn('Advantage: kamal');
    }
    function it_should_score_3_4_game()
    {
        $this->kamal->earnPoints(3);
        $this->iyad->earnPoints(4);
        $this->score()->shouldReturn('Advantage: iyad');
    }
    function it_should_score_5_4_game()
    {
        $this->kamal->earnPoints(5);
        $this->iyad->earnPoints(4);
        $this->score()->shouldReturn('Advantage: kamal');
    }
    function it_should_score_3_3_game()
    {
        $this->kamal->earnPoints(3);
        $this->iyad->earnPoints (3);
        $this->score()->shouldReturn('Deuce');
    }
    function it_should_score_10_10_game()
    {
        $this->kamal->earnPoints(10);
        $this->iyad->earnPoints (10);
        $this->score()->shouldReturn('Deuce');
    }
    function it_should_score_11_10_game()
    {
        $this->kamal->earnPoints(11);
        $this->iyad->earnPoints (10);
        $this->score()->shouldReturn('Advantage: kamal');
    }
    function it_should_score_12_10_game()
    {
        $this->kamal->earnPoints(12);
        $this->iyad->earnPoints (10);
        $this->score()->shouldReturn('Winner: kamal');
    }
}
