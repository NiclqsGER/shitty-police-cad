        <?php 
        if(!$_SESSION['power'] >= 5) {
            header('location: index.php?p=interface&c=ausbildung');
            exit;
        }

        if(isset($_POST['submit'])) {
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare("INSERT INTO ausbildung (AUSBILDUNGSART, AUSBILDUNGSCONTEXT, BETROFFENE_EINHEITEN, DATUM, CREATE_DATE, CREATOR_ID, CREATOR_NAME) VALUES (:ausbildungsart, :context, :betroffene_unit, :wann, :created_at, :creator_id, :creator_name);");
            $stmt->bindParam(":ausbildungsart", $_POST['ausbildungsart'], PDO::PARAM_STR);
            $stmt->bindParam(":context", $_POST['context'], PDO::PARAM_STR);
            $stmt->bindParam(":betroffene_unit", $_POST['betroffene_unit'], PDO::PARAM_STR);
            $stmt->bindParam(":wann", $_POST['wann'], PDO::PARAM_STR);
            $now = time();
            $stmt->bindParam(":created_at", $now, PDO::PARAM_STR);
            $stmt->bindParam(":creator_id", $_SESSION['id']);
            $name = $_SESSION['vorname'] . " " . $_SESSION['nachname'];
            $stmt->bindParam(":creator_name", $name, PDO::PARAM_STR);
            $stmt->execute();
            echo '<div class="alert alert-success" role="alert">Die Nachricht wurde erstellt!</div>';
        }
        
        ?>
        <div class="alert alert-danger" role="alert">
            Sei dir sicher, ob der Monat auch wirklich 31 Tage hat! <a href="https://prnt.sc/vooj9j" target="_blank">Mehr dazu</a>
        </div>

        <form action="index.php?p=interface&c=addausbildung" method="POST">
                <div class="form-group">
                    <label for="1">Ausbildungsart</label>
                    <textarea name="ausbildungsart" class="form-control" id="1" rows="1" require></textarea>
                    <br>
                    <label for="1">Ausbildungsinhalte</label>
                    <textarea name="context" class="form-control" id="1" rows="10" require></textarea>
                    <br>
                    <label for="1">Betroffene Einheiten (Beispiel Format: 10-10, 10-11, 10-12 (..))</label>
                    <textarea name="betroffene_unit" class="form-control" id="1" rows="1" require></textarea>
                    <br>
                    <label for="1">Wann? <strong>(Beispiel Format: 01.11.2020 - 18:30)</strong></label>
                    <input  name="wann" class="form-control" value="01.11.2020 - 18:30" id="1" rows="1" require></input>
                    <br>
                    <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Ausbildung ankündigen</button>
                </div>
            </form>

            <!-- <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tag</label>
                                <select name="tag" class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Monat</label>
                                <select name="monat" class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jahr</label>
                                <select name="jahr" class="form-control" id="exampleFormControlSelect1">
                                <option>2020</option>
                                <option>2021</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Uhrzeit</label>
                                <select name="stunde" class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Minute</label>
                                <select name="minute" class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                                <option>32</option>
                                <option>33</option>
                                <option>34</option>
                                <option>35</option>
                                <option>36</option>
                                <option>37</option>
                                <option>38</option>
                                <option>39</option>
                                <option>40</option>
                                <option>41</option>
                                <option>42</option>
                                <option>43</option>
                                <option>44</option>
                                <option>45</option>
                                <option>46</option>
                                <option>47</option>
                                <option>48</option>
                                <option>49</option>
                                <option>50</option>
                                <option>51</option>
                                <option>52</option>
                                <option>53</option>
                                <option>54</option>
                                <option>55</option>
                                <option>56</option>
                                <option>57</option>
                                <option>58</option>
                                <option>59</option>
                                <option>60</option>
                                </select>
                            </div>
                        </div>
                    </div> -->