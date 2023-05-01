public class GameCurrency
{
    private int amount;

    public GameCurrency(int initialAmount)
    {
        amount = initialAmount;
    }

    public void Add(int value)
    {
        amount += value;
    }

