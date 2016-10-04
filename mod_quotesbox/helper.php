<?php

class ModQuotesBoxHelper
{
    public static function getQuote($rotate, $category)
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__quotesbox'));
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        if (empty($rows)) return  $quote = [" ", " "];


        if ($rotate === 'random') {
          return self::getRandomQuote($category);
        } elseif ($rotate === 'daily') {
          return self::getDailyQuote($category);
        }


    }

    public static function getRandomQuote($categoryId)
    {
      // Filter by a single or group of categories
      $db = JFactory::getDBO();
      $query = $db->getQuery(true)
          ->select('*')
          ->from($db->quoteName('#__quotesbox'));
      if ((is_array($categoryId)) && (count($categoryId) > 0))
          {
            $categoryId = implode(',', $categoryId);

            if ($categoryId != '0')
            {
              $query->where('catid ' . ' = ' . ' (' . $categoryId . ')');
            }
      }

      $db->setQuery($query);
      $rows = $db->loadObjectList();
      $i = rand(0, count($rows) - 1);
      $row = array($rows[$i]);
      $quote = [$row[0]->quote, $row[0]->author];
      return $quote;

    }

    public static function setDailyQuote($categoryId)
    {
      $today = time();

      $db = JFactory::getDBO();
      $query = $db->getQuery(true)
                  ->select('MIN(id)')
                  ->from($db->quoteName('#__quotesbox'))
                  ->where('catid ' . ' = ' . ' (' . $categoryId . ')');
      $db->setQuery($query);
      $first_quote_id = $db->loadResult();

      $query = $db->getQuery(true);
      $fields = array(
          $db->quoteName('daily').' = '.$db->quote( $today ),
      );

      $conditions = array(
          $db->quoteName('id').' = ' . $first_quote_id,
      );

      $query->update($db->quoteName('#__quotesbox'))->set($fields)->where($conditions);
      $db->setQuery($query);

      $db->execute();

      $query = $db->getQuery(true)
        ->select('daily')
        ->from($db->quoteName('#__quotesbox'))
        ->where('`daily` > '. 0);
      $db->setQuery($query);
      return $quote_day = $db->loadResult();
    }

    public static function getDailyQuote($categoryId)
    {
      $today = time();
      $db = JFactory::getDBO();

      $category = $categoryId;
      $categoryId = implode(',', $categoryId);

      $query = $db->getQuery(true)
                  ->select('catid')
                  ->from($db->quoteName('#__quotesbox'))
                  ->where('`daily` > '. 0)
                  ->where('catid ' . ' = ' . ' (' . $categoryId . ')');
      $db->setQuery($query);
      $catid = $db->loadResult();

      $query = $db->getQuery(true)
        ->select('daily')
        ->from($db->quoteName('#__quotesbox'))
        ->where('`daily` > '. 0)
        ->where('catid ' . ' = ' . ' (' . $categoryId . ')');
      $db->setQuery($query);
      $quote_day = $db->loadResult();

      if (!in_array( $catid, $category)) {
          $quote_day = self::setDailyQuote($categoryId);
      }


      if (is_null($quote_day)) {
        $quote_day = self::setDailyQuote($categoryId);
      }

      if (date('j', $today) != date('j', $quote_day) ) {
        $query = $db->getQuery(true)
                    ->select('id')
                    ->from($db->quoteName('#__quotesbox'))
                    ->where('`daily` = '. $db->quote($quote_day))
                    ->where('catid ' . ' = ' . ' (' . $categoryId . ')');
        $db->setQuery($query);
        $quote_day_id = $db->loadResult();

        $query = $db->getQuery(true)
                    ->select('id')
                    ->from($db->quoteName('#__quotesbox'))
                    ->where('id > '. $db->quote($quote_day_id))
                    ->where('catid ' . ' = ' . ' (' . $categoryId . ')')
                    ->setLimit('1');
        $db->setQuery($query);
        $quote_next_day_id = $db->loadResult();

        if (is_null($quote_next_day_id)) {
          $query = $db->getQuery(true)
                      ->select('MIN(id)')
                      ->from($db->quoteName('#__quotesbox'))
                      ->where('catid ' . ' = ' . ' (' . $categoryId . ')');
          $db->setQuery($query);
          $first_quote_id = $db->loadResult();
          $quote_next_day_id = $first_quote_id;
        }

        $query = $db->getQuery(true);
        $fields = array(
            $db->quoteName('daily').' = ' . $today,
        );
        $conditions = array(
            $db->quoteName('id').' = ' .   $quote_next_day_id,
        );
        $query->update($db->quoteName('#__quotesbox'))->set($fields)->where($conditions);
        $db->setQuery($query);
        $db->execute();


        $query = $db->getQuery(true);
        $fields = array(
            $db->quoteName('daily') .' = 0',
        );
        $conditions = array(
            $db->quoteName('id').' = ' . $quote_day_id,
        );
        $query->update($db->quoteName('#__quotesbox'))->set($fields)->where($conditions);
        $db->setQuery($query);
        $db->execute();
      }

      $query = $db->getQuery(true)
          ->select('*')
          ->from($db->quoteName('#__quotesbox'))
          ->where(' daily > 0')
          ->where('catid ' . ' = ' . ' (' . $categoryId . ')');
      $db->setQuery($query);
      $rows = $db->loadObjectList();
      return $quote = [$rows[0]->quote, $rows[0]->author];

    }
}
